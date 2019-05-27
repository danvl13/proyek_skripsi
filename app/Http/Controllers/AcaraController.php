<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\{Acara,Divisiperacara,Jadwal};
use Carbon\Carbon;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public $module;
    public $moduleacaradiikuti;

    public function __construct()
    {
       $this->middleware('auth');
       $this->module = 'acara';
       $this->moduleacaradiikuti = 'acaradiikuti';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->status==3){
            $list_acara= Acara::/*whereHas('jadwal', function($q){
                $q->where('tgl_wawan_terbesar', 1)->where('tgl_wawan', '>=', Carbon::today());
            })->*/get();
        }else{
            $list_acara= Acara::with(['jadwal' => function($q){
                $q->where('user_id', Auth::user()->id);
            }])->whereDoesntHave('jadwal', function($q){
                $q->where('user_id', Auth::user()->id);
            })->where('status', 1)->where('user_id','!=',Auth::user()->id)->whereHas('jadwal', function($q){
                $q->where('tgl_wawan_terbesar', 1)->where('tgl_wawan', '>=', Carbon::today());
            })->where('ipkmin','<=',Auth::user()->ipk)
            ->whereHas('jadwal', function($q){
                $q->where('user_id',null);
            })->whereHas('divisiperacara', function($q){
                $q->where('kuota', '>', 0);
            })->get();
        }
        return view('acara.index')
            ->with('list_acara',$list_acara)
            ->with('module',$this->module)
            ->with('today', Carbon::today());
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('acara.create')->with('module',$this->module);
    // }

    public function diikuti()
    {
        
        $list_acara= Acara::with(['jadwal' => function($q){
            $q->where('user_id', Auth::user()->id);
        }])->whereHas('jadwal', function($q){
            $q->where('user_id', Auth::user()->id);
        })->get();
        // $list_acara= Acara::where('status', 1)->with('jadwal')->get();
        
        return view('acara-diikuti.index')->with('list_acara',$list_acara)->with('module',$this->moduleacaradiikuti);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        //
    }

    //mahasiswa mendaftar kedalam suatu acara
    public function pendaftar(Request $request)
    {
        DB::transaction(function () use($request){
            $jadwal=Jadwal::where('id', $request->input('jadwal_id'))->first();
            $jadwal->user_id=Auth::user()->id;
            $jadwal->divisi_id = $request->input('divisi_id');
            $jadwal->save();
            $divisiperacara=Divisiperacara::where('id', $request->input('divisi_id'))->first();
            $divisiperacara->kuota-=1;
            $divisiperacara->save();   
        });
        
        return redirect()->route('acara.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Acara $acara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acara $acara)
    {
        //
    }

    public function approve($id)
    {
        $acara=Acara::where('id', $id)->first();
        $acara->status=1;
        $acara->save();
        return redirect()->route('acara.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acara $acara)
    {
        //
    }
    public function lihat($id){
        $acara=Acara::where('id',$id)
            ->with(['jadwal' => function($q){
                $q->where('user_id', Auth::user()->id);
            }])->whereHas('jadwal', function($q){
                $q->where('user_id', Auth::user()->id);
            })->first();
        return view('acara-diikuti.view')->with('acara',$acara)->with('module',$this->moduleacaradiikuti);
    }

    public function view($id){
        $acara=Acara::where('id',$id)->first();
        $list_divisi= Divisiperacara::where('acara_id',$id)->where('kuota', '>',0)->get();
        $list_jadwal= Jadwal::where('acara_id',$id)
            ->where('tgl_wawan','>',Carbon::today())
            ->where('user_id',null)
            ->get();
        //Sistem Rekomendasi Divisi
        $arr= collect([]);
        foreach($list_divisi as $div){
            $count=Jadwal::where('user_id', Auth::user()->id)->where('divisi_id',$div->divisi->id)->where('status',1)->count();
            
            $arr->push(['divisi'=>$div,'count'=>$count]);
        }
        
        $sort=$arr->sortByDesc('count');
        
        return view('acara.view')
            ->with('acara',$acara)
            ->with('list_divisi',$list_divisi)
            ->with('list_jadwal',$list_jadwal)
            ->with('sort',$sort)
            ->with('module',$this->module);
    }
    
}
