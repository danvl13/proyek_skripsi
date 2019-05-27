<?php

namespace App\Http\Controllers;

use App\Divisi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public $module;

    public function __construct()
    {
        $this->module = 'divisi';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_divisi= Divisi::all();
        return view('divisi.index')->with('list_divisi',$list_divisi)->with('module',$this->module);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divisi.create')->with('module',$this->module);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required|unique:divisis,nama',
        ]);

            $divisi=new Divisi;
            $divisi->nama = $request->input('nama');
            $divisi->save();
        
        return redirect()->route('divisi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisi=Divisi::where('id',$id)->first();
        return view('divisi.create')->with('divisi',$divisi)->with('module', $this->module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        $this->validate($request, [
            'nama'=>'required|unique:divisis,nama',
        ]);
        
        $divisi=Divisi::where('id', $request->input('id'))->first();
        $divisi->nama=$request->input('nama');
        $divisi->save(); 
        return redirect()->route('divisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        //
    }
}
