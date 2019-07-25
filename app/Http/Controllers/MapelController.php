<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;

class MapelController extends Controller
{
    public function index()
    {
    	$mapel= Mapel::all();
    	$guru = \App\Guru::all();
    	return view('mapel.index',['data_mapel'=>$mapel,'link'=>'HiStudent | Mata Pelajaran','active'=>'mapel', 'data_guru'=>$guru]);
    }

    public function create(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'kode' => 'required|unique:mapel',
    		'semester' => 'required'
    	]);
    	Mapel::create($request->all());
    	return redirect('/mapel');
    }

    public function edit(Mapel $mapel)
    {
    	return view('mapel.edit',['mapel'=>$mapel, 'link'=>'HiStudent | Mata Pelajaran','active'=>'mapel']);
    }

    public function update(Request $request, Mapel $mapel)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'kode' => 'required|unique:mapel',
    		'semester' => 'required'
    	]);

    	$mapel->update($request->all());
    	return redirect('/mapel');
    }

    public function delete(Siswa $Siswa)
    {
    	$siswa->delete();
    }

    public function profile(Mapel $mapel)
    {
    	return view('mapel.profile',['data_mapel'=>$mapel]);
    }
}
