<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $list_mahasiswa= User::all();
        return view('mahasiswa.index')->with('list_mahasiswa',$list_mahasiswa);
    }

    public function create()
    {
        return view('acara-pengurus.create');
    }

    public function edit($id)
    {
        $acara=Acara::where('id',$id)->first();
        return view('acara-pengurus.create')->with('acara',$acara);
    }

    public function store(Request $request)
    {
        $acara=Acara::where('id',$id)->first();
        return view('acara-pengurus.create')->with('acara',$acara);
    }

    public function update(Request $request)
    {
        $acara=Acara::where('id',$id)->first();
        return view('acara-pengurus.create')->with('acara',$acara);
    }
}
