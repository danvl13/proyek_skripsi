<?php

namespace App\Http\Controllers;
use Auth;
use App\{Acara, Kategori, Divisi, Divisiperacara, Jadwal};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcaraPengurusController extends Controller
{
    public function index(){
        $list_acara= Acara::where('user_id',Auth::user()->id)->get();
        return view('acara-pengurus.index')->with('list_acara',$list_acara);
    }

    public function create()
    {
        $list_kategori= Kategori::all();
        $list_divisi= Divisi::all();
        return view('acara-pengurus.create')->with('list_kategori',$list_kategori)->with('list_divisi',$list_divisi);
    }

    public function edit($id)
    {
        $acara=Acara::where('id',$id)->first();
        $list_kategori= Kategori::all();
        $list_divisi= Divisi::all();
        return view('acara-pengurus.create')->with('acara',$acara)->with('list_kategori',$list_kategori)->with('list_divisi',$list_divisi);
    }

    public function store(Request $request)
    {
        dd($request);
        DB::transaction(function() use($request){
            $acara=new Acara;
            $acara->nama=$request->input('nama');
            $acara->tgl_mulai_acara=$request->input('tgl_mulai_acara');
            $acara->tgl_selesai_acara=$request->input('tgl_selesai_acara');
            $acara->tmpt_acara=$request->input('tempat_acara');
            $acara->keterangan=$request->input('keterangan');
            $acara->ipkmin=$request->input('ipkmin');
            $acara->user_id=Auth::user()->id;
            $acara->kategori_id=$request->input('kategori_id');
            $acara->save();

            foreach($request->input('kuota') as $key => $divisiperacara){
                $divisiperacara= new Divisiperacara;
                $divisiperacara->kuota=$request->input('kuota')[$key];
                $divisiperacara->acara_id =$acara->id;
                $divisiperacara->divisi_id=$request->input('divisi_id')[$key];
                $divisiperacara->save();
            }
            
            foreach($request->input('tgl_wawan') as $key => $jadwal){
                $jadwal= new Jadwal;
                $jadwal->tgl_wawan=$request->input('tgl_wawan')[$key];
                $jadwal->jam_wawan=$request->input('jam_wawan')[$key];
                $jadwal->tmpt_wawan=$request->input('tmpt_wawan')[$key];
                $jadwal->pewawancara=$request->input('pewawancara')[$key];
                $jadwal->acara_id =$acara->id;
                $jadwal->tgl_wawan_terbesar = $request->input('tgl_wawan_terbesar')[$key] == '1'? true : false;
                $jadwal->save();
            }
        });
        

        return redirect()->route('acara-pengurus.index');
    }

    public function update(Request $request)
    {
        // dd($request);
        DB::transaction(function() use($request){
            $acara=Acara::where('id', $request->input('id'))->first();
            $acara->nama=$request->input('nama');
            $acara->tgl_mulai_acara=$request->input('tgl_mulai_acara');
            $acara->tgl_selesai_acara=$request->input('tgl_selesai_acara');
            $acara->tmpt_acara=$request->input('tempat_acara');
            $acara->keterangan=$request->input('keterangan');
            $acara->ipkmin=$request->input('ipkmin');
            $acara->user_id=Auth::user()->id;
            $acara->kategori_id=$request->input('kategori_id');
            $acara->save();
            
            $newDivisi=[];
            $divPerAcara = $request->input('id_divisiperacara');
            // dd($divPerAcara);
            foreach($divPerAcara as $key => $div){
                $newDivisi[]=Divisiperacara::updateOrcreate(
                    [
                        'id'=> $divPerAcara[$key],
                        'acara_id'=> $acara->id
                    ],
                    [
                        'kuota'=> $request->input('kuota')[$key],
                        'divisi_id'=> $request->input('divisi_id')[$key]
                    ]
                );
            }
           
            $newDivisi = collect($newDivisi);
            $list_divisi = Divisiperacara::where('acara_id', $acara->id)->get();
            foreach($list_divisi as $divisi){
                // dd($divisi->id);
                if(!$newDivisi->pluck('id')->contains($divisi->id)){
                    $divisi->delete();
                }
            }

            $newJadwal=[];
            foreach((array)$request->input('tgl_wawan') as $key => $jadwal){
                // var_dump($request->input('tgl_wawan_terbesar')[$key]);
                // die();
                $newJadwal[] = Jadwal::updateOrcreate(
                    ['id'=> $request->input('id_jadwal')[$key] ],
                    [
                        'tgl_wawan'=> $request->input('tgl_wawan')[$key],
                        'jam_wawan'=> $request->input('jam_wawan')[$key],
                        'tmpt_wawan'=> $request->input('tmpt_wawan')[$key],
                        'pewawancara'=> $request->input('pewawancara')[$key],
                        'acara_id'=> $acara->id,
                        'tgl_wawan_terbesar' => $request->input('tgl_wawan_terbesar')[$key] == '1'? true : false,
                    ]
                );
            }
            $newJadwal=collect($newJadwal);
            // dd($newJadwal);
            $list_jadwal =Jadwal::where('acara_id',$acara->id)->get();
            // dd($list_jadwal);
            foreach($list_jadwal as $jadwal){
                // dd($jadwal);
                // dd($newJadwal->pluck('id'));
                if(!$newJadwal->pluck('id')->contains($jadwal->id)){
                    $jadwal->delete();
                }
            }

            // $jadwal= Jadwal::where('acara_id', $request->input('id'))->delete();
            // foreach($request->input('tgl_wawan') as $key => $jadwal){
            //     $jadwal= new Jadwal;
            //     $jadwal->tgl_wawan=$request->input('tgl_wawan')[$key];
            //     $jadwal->jam_wawan=$request->input('jam_wawan')[$key];
            //     $jadwal->tmpt_wawan=$request->input('tmpt_wawan')[$key];
            //     $jadwal->pewawancara=$request->input('pewawancara')[$key];
            //     $jadwal->acara_id =$acara->id;
            //     $jadwal->save();
            // }
        
        });

        return redirect()->route('acara-pengurus.index');
    }
    public function delete(Request $request){
        $id = $request->input('id');
        $divisi=Divisiperacara::where('acara_id', $id)->first();
        $divisi->delete();
        $jadwal=Jadwal::where('acara_id',$id)->first();
        $jadwal->delete();
        $acara = Acara::findOrFail($id);
        $acara->delete();
        return ['status'=>'ok'];
    }
    public function view($id){
        $acara=Acara::where('id',$id)->first();
        $list_kategori= Kategori::all();
        $list_divisi= Divisi::all();
        return view('acara-pengurus.view')->with('acara',$acara)->with('list_kategori',$list_kategori)->with('list_divisi',$list_divisi);
    }
}
