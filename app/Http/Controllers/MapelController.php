<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Exports\MapelExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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

    public function exportExcel() 
    {
        return Excel::download(new MapelExport, 'mapel.xlsx');
    }

    public function exportPdf()
    {   
        $mapel=Mapel::all();
        $guru=\App\Guru::all();
        // return view('export.mapelpdf', ['mapel'=>$mapel,'guru'=>$guru]);
        $pdf = PDF::loadView('export.mapelpdf', ['mapel'=>$mapel,'guru'=>$guru]);
        return $pdf->download('mapel.pdf');
    }
}
