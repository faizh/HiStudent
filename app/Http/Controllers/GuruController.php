<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Guru;

class GuruController extends Controller
{
	public function index(Request $request)
	{

		if($request->has('cari')){
    		$data_guru=Guru::where('nama_depan','LIKE','%'.$request->cari.'%')->get();	
    	}else{
    		$data_guru=Guru::all();
    	}
    	$mapel= \App\Mapel::all();
    	return view('guru.index',['data_guru'=>$data_guru,'mapel'=>$mapel,'link'=>'HiStudent | Guru','active'=>'guru']);
	}
    public function profile(Guru $guru)
    {
    	$mapel= \App\Mapel::find($guru->mapel_id);
    	return view('guru.profile',['guru'=>$guru,'mapel'=>$mapel,'link'=>'HiStudent | Guru','active'=>'guru']);
    }

    public function create(Request $request)
    {
    	// dd($mapel);
    	$this->validate($request, [
    		'nama' => 'required|min:5',
    		'email' => 'required|unique:users',
    		'telepon' => 'required',
    		'alamat' => 'required',
    		'avatar' => 'mimes:jpg,jpeg,png'
    	]);

    	$user = new \App\User;
    	$user->name=$request->nama;
    	$user->email=$request->email;
    	$user->password=bcrypt('rahasia');
    	$user->level='guru';
    	$user->remember_token=str_random(10);
    	$user->save();


    	$request->request->add(['user_id'=>$user->id]);
    	$mapel = \App\Mapel::find($request->mapel);
    	$guru = new Guru;
    	$guru->nama=$request->nama;
    	$guru->telepon=$request->telepon;
    	$guru->alamat=$request->alamat;
    	$guru->mapel_id=$mapel->id;
    	$guru->save();

    	if ($request->hasFile('avatar')) {
    		$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
    		$guru->avatar = $request->file('avatar')->getClientOriginalName();
    		$guru->save();
    		# code...
    	}

    	return redirect('/guru')->with('sukses','Data Disimpan');
    }

    public function edit(Guru $guru)
    {
    	return view('guru.edit',['guru'=>$guru,'link'=>'HiStudent | Guru','active'=>'guru']);
    }

    public function update(Request $request, Guru $guru)
    {
        
    	$this->validate($request, [
    		'nama' => 'required|min:5',
    		'telepon' => 'required',
    		'alamat' => 'required',
    		'avatar' => 'mimes:jpg,jpeg,png'
    	]);

    	$guru->update($request->all());

    	if ($request->hasFile('avatar')) {
    		$request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
    		$guru->avatar = $request->file('avatar')->getClientOriginalName();
    		$guru->save();
    		# code...
    	}

    	return redirect('/guru')->with('sukses','Data Berhasil Di Edit');
    }


    public function delete(Guru $guru)
    {
    	$guru->delete();
    	return redirect ('/guru')->with('sukses','Data Berhasil Di Hapus');
    }

    public function exportExcel()
    {
    	 return Excel::download(new GuruExport, 'guru.xlsx');
    }

    public function exportPdf()
    {   
        $guru = Guru::all();
        $mapel = \App\Mapel::all();
        $pdf = PDF::loadView('export.gurupdf', ['guru'=>$guru,'mapel'=>$mapel]);
        return $pdf->download('guru.pdf');
    }
}
