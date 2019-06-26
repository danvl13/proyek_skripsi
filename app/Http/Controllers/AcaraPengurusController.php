<?php

namespace App\Http\Controllers;
use Auth;
use App\{Acara, Kategori, Divisi, Divisiperacara, Jadwal};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Session};
use Carbon\Carbon;

class AcaraPengurusController extends Controller
{
    public $module;

    public function __construct()
    {
       $this->module = 'acaradidaftarkan';
    }
    public function index(){
        $list_acara= Acara::where('user_id',Auth::user()->id)->get();
        $today=Carbon::today();
        return view('acara-pengurus.index')->with('list_acara',$list_acara)->with('today',$today)->with('module',$this->module);
    }

    public function create()
    {
        $list_kategori= Kategori::all();
        $list_divisi= Divisi::all();
        return view('acara-pengurus.create')->with('list_kategori',$list_kategori)->with('module',$this->module)->with('list_divisi',$list_divisi);
    }

    public function edit($id)
    {
        $acara=Acara::where('id',$id)->first();
        $list_kategori= Kategori::all();
        $list_divisi= Divisi::all();
        return view('acara-pengurus.create')->with('acara',$acara)->with('module',$this->module)->with('list_kategori',$list_kategori)->with('list_divisi',$list_divisi);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required|unique:acaras,nama',
        ]);

        DB::transaction(function() use($request){
            $acara=new Acara;
            $acara->nama=$request->input('nama');
            $acara->tgl_mulai_acara=$request->input('tgl_mulai_acara');
            $acara->tgl_selesai_acara=$request->input('tgl_selesai_acara');
            $acara->tgl_batas_ubah=$request->input('tgl_batas_ubah');
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
        
        $request->session()->flash('successMsg','Data berhasil ditambahkan');
        return redirect()->route('acara-pengurus.index');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required',
        ]);

        $error = DB::transaction(function() use($request){
            $acara=Acara::where('id', $request->input('id'))->first();
            if($acara->nama != $request->input('nama')){
                $acaraName = Acara::where('nama', $request->input('nama'))->count();
                if($acaraName == 0){
                    $acara->nama=$request->input('nama');
                } else {
                    return 'Nama acara sudah dipakai';
                }
                
            }
            $acara->tgl_mulai_acara=$request->input('tgl_mulai_acara');
            $acara->tgl_selesai_acara=$request->input('tgl_selesai_acara');
            $acara->tgl_batas_ubah=$request->input('tgl_batas_ubah');
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
        if($error){
            return back()->withInput()->with('errorMsg', $error);
        } else {
            return redirect()->route('acara-pengurus.index');
        }
        
    }
    // public function delete(Request $request){
    //     $id = $request->input('id');
    //     $acara = Acara::findOrFail($id);
    //     if($acara->status == 0){
    //         DB::transaction(function() use($id){
    //             $divisi=Divisiperacara::where('acara_id', $id)->first();
    //             $divisi->delete();
    //             $jadwal=Jadwal::where('acara_id',$id)->first();
    //             $jadwal->delete();
    //             $acara->delete();
    //         });
    //     }
    //     return ['status'=>'ok'];
    // }
    public function view($id){
        $acara=Acara::with('jadwal.divisiperacara.divisi')->where('id',$id)->first();
        // dd($acara->jadwal);
        $list_jadwal = DB::table('jadwals')
            ->select('jadwals.tgl_wawan','jadwals.id','jadwals.acara_id', 'jadwals.jam_wawan', 'jadwals.tmpt_wawan', 'jadwals.pewawancara','jadwals.status','users.nama','users.id as user_id','users.tahun', 'users.ipk','divisis.nama AS divisi')
            ->leftjoin('users', 'jadwals.user_id', '=', 'users.id')
            ->leftjoin('divisiperacaras', 'jadwals.divisi_id', '=', 'divisiperacaras.id')
            ->leftjoin('divisis', 'divisiperacaras.divisi_id', '=', 'divisis.id')
            ->where('jadwals.acara_id', $id)
            ->orderBy('users.tahun')
            ->get();
        // dd($list_jadwal);
        // $rating=Jadwal::whereHas('user')->with('user')->where('acara_id',$id)->get();
        $list_kategori= Kategori::all();
        $list_divisi= Divisi::all();
        return view('acara-pengurus.view')
            // ->with('rating',$rating)
            ->with('tahun', (int) Carbon::now()->format('Y'))
            ->with('acara',$acara)
            ->with('module',$this->module)
            ->with('list_kategori',$list_kategori)
            ->with('list_divisi',$list_divisi)
            ->with('list_jadwal',$list_jadwal) ;
    }
    public function hasil($id){
        $list_terima=Jadwal::where('acara_id',$id)->where('status',1)->get();
        $list_tolak=Jadwal::where('acara_id',$id)->where('status',2)->get();
        return view('acara-pengurus.hasil')->with('list_terima',$list_terima)->with('module',$this->module)->with('list_tolak',$list_tolak);
    }
    public function terima($acara, $id)
    {
        
        $jadwal=Jadwal::where('id',$id)->first();
        $divisiperacara=Divisiperacara::where('id', $jadwal->divisi_id)->first();
        $divisi = '';
        if($divisiperacara->kuota>0){

            DB::transaction(function () {
                $jadwal->status=1;
                $jadwal->save();
                $divisiperacara->kuota-=1;
                $divisiperacara->save(); 
            });      
        }
        else{
            Session::flash('errorMsg','Kuota untuk menerima mahasiswa untuk divisi '.$divisiperacara->divisi->nama.' sudah habis');
        }
          
        return redirect()->route('acara-pengurus.view', ['id' => $acara]);
    }
    public function tolak($acara, $id)
    {
        $jadwal=Jadwal::where('id',$id)->first();
        $jadwal->status=2;
        $jadwal->save();
        return redirect()->route('acara-pengurus.view', ['id' => $acara]);
    }
}
