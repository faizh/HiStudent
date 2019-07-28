<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    public function index()
    {
    	$kelas = Kelas::all();	
    	$wali = \App\Guru::all();
    	return view('kelas.index',['kelas'=>$kelas,'link'=>'HiStudent | Siswa','active'=>'siswa','wali'=>$wali,'siswa'=>datasiswa()]);
    }

    public function create(Request $request)
    {
	 	$this->validate($request,[
            'guru_id' => 'required|unique:kelas'
        ]);

    	Kelas::create($request->all());
    	return redirect('/kelas');
    }

    public function siswa($id)
    {
    	return redirect('/siswa')->with('kelasid',$id);
    }

    public function edit(Kelas $kelas)
    {
    	return view('kelas.edit',['kelas'=>$kelas, 'link'=>'HiStudent | Siswa','active'=>'siswa']);
    }

    public function update(Request $request, Kelas $kelas)
    {
    	
    }
}