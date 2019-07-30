<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->mapel()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
    }

    public function editjadwalrpl1(Request $request, $id)
    {
    	$jadwal = \App\Jadwal::find($id);
    	$mapel = \App\Mapel::find($request->value);
    	\App\Jadwal::where('id',$id)->update(array('rpl1' => $mapel->kode));
    }

    public function editjadwalrpl2(Request $request, $id)
    {
    	$jadwal = \App\Jadwal::find($id);
    	$mapel = \App\Mapel::find($request->value);
    	\App\Jadwal::where('id',$id)->update(array('rpl2' => $mapel->kode));
    }

    public function editjadwalrpl3(Request $request, $id)
    {
    	$jadwal = \App\Jadwal::find($id);
    	$mapel = \App\Mapel::find($request->value);
    	\App\Jadwal::where('id',$id)->update(array('rpl3' => $mapel->kode));
    }

    public function editjadwalrpl4(Request $request, $id)
    {
    	$jadwal = \App\Jadwal::find($id);
    	$mapel = \App\Mapel::find($request->value);
    	\App\Jadwal::where('id',$id)->update(array('rpl4' => $mapel->kode));
    }
}
