<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
    	// dd(dataJadwal('selasa'));
    	return view('jadwal.index',['link'=>'Jadwal','active'=>'jadwal']);
    }

    public function create(Request $request)
    {
    	$nama=$request->hari."".$request->jam;
    	$kelas=$request->kelas;
    	// $jadwal=Jadwal::where('nama','LIKE',$nama)->get();
    	// $jadwal->insert(
    	// 	[$kelas=>$request->mapel]
    	// );

    	// Jadwal::insert(
    	// 	[$kelas=>$request->mapel]
    	// )->where('nama','LIKE',$nama);

    	// Jadwal::where('nama','LIKE',$nama)->insert(
    	// 	[$kelas=>$request->mapel]
    	// );

    	Jadwal::where('nama',$nama)->update(array($kelas => $request->mapel));

    	return redirect('/jadwal');
    }
}
