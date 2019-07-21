<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
    	if($request->has('cari')){
    		$data_siswa=\App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();	
    	}else{
    		$data_siswa=\App\Siswa::all();
    	}
    	return view('siswa.index',['data_siswa'=>$data_siswa]);
    }

    public function create(Request $request)
    {
        $user = new \App\User;
        $user->level='siswa';
        $user->name=$request->nama_depan;
        $user->email=$request->email;
        $user->password=bcrypt('rahasia');
        $user->remember_token=str_random(24);
        $user->save();

        $request->request->add(['user_id'=>$user->id]);
        $siswa = \App\Siswa::create($request->all());
    	return redirect('/siswa')->with('sukses','Data Disimpan');
    }

    public function edit($id)
    {
    	$siswa=\App\Siswa::find($id);
    	return view('siswa.edit',['siswa'=>$siswa]);
    }

    public function update(Request $request, $id)
    {
    	$siswa=\App\Siswa::find($id);
    	$siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            // $image=$request->file('avatar');
            // $filename=$image->getClientOriginalName();
            // $path = public_path('images/'.$filename);
            // Image::make($image->getRealPath())->resize(100,100)->save($path);
            // $siswa->avatar=$filename;
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
		return redirect('/siswa')->with('sukses','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
    	$siswa=\App\Siswa::find($id);
    	$siswa->delete();
    	return redirect('/siswa')->with('sukses','Data Berhasil Dihapus');
    }

    public function profile($id)
    {
        $siswa=\App\Siswa::find($id);
        return view('siswa.profile',['siswa'=>$siswa]);
    }
}
