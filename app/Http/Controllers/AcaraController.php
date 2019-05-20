<?php

namespace App\Http\Controllers;

use App\Acara;
use Carbon\carbon;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::check());

        $list_acara= Acara::where('status', 1)->whereHas('jadwal', function($q){
            $q->where('tgl_wawan_terbesar', 1)->where('tgl_wawan', '>', Carbon::now());
        })->get();
        return view('acara.index')->with('list_acara',$list_acara);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acara.create');
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

    public function pendaftar($id)
    {
        $users = User::all();
        
        return view('home')->with('users', $users);
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
}
