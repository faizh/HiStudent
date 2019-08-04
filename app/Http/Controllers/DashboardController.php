<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('dashboards.index',['link'=>'HiStudent | Dashboard','active'=>'dashboard']);
    }

    public function profile($id)
    {
    	$user=\App\User::find($id);
    	$siswa=\App\Siswa::where('user_id','LIKE',$id)->get()->first();
    	$guru=\App\Guru::where('user_id','LIKE',$id)->get()->first();
    	
    	if ($siswa!=null) {
	    	$matapelajaran= \App\Mapel::all();
	        //Data CHART
	        $categories = [];
	        $data=[];
	        foreach ($matapelajaran as $mp) {
	            if ($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()) {
	                $categories[]=$mp->nama;
	                $data[]=$siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
	            }
	        }
			return view('dashboards.profile',['user'=>$user,'link'=>'HiStudent | Profile','active'=>'profile','siswa'=>$siswa,'guru'=>$guru,'matapelajaran'=>$matapelajaran,'categories'=>$categories,'data'=>$data]);
    	}elseif ($guru!=null) {
    		$mapel= \App\Mapel::find($guru->mapel_id);
    		
	    	return view('dashboards.profile',['guru'=>$guru,'mapel'=>$mapel,'link'=>'HiStudent | Profile','active'=>'profile']);
    	}else{
    		return view('dashboards.profile',['user'=>$user,'link'=>'HiStudent | Profile','active'=>'profile']);
    	}
    }

    public function changePass(Request $request, $id)
    {
    	$user=\App\User::find($id);
    	$password = Hash::make($request->password_lama);
    	if ($request->has('password_baru')) {
    		if ($request->password_baru==$request->ulang_password_baru) {
    			$password=Hash::make($request->password_baru);
    			$user->update(array('password' => $password));
    			return redirect('/dashboard/'.$id.'/profile')->with('sukses','Password Berhasil Di Ganti!');
    		}
    		return redirect('/dashboard/'.$id.'/profile')->with(['error'=>'Password Tidak Sama','changeable'=>'true']);
    	}

    	if (Hash::check($request->password_lama, $user->password)) {
    		return redirect('/dashboard/'.$id.'/profile')->with('changeable','true');
    	}
    	return redirect('/dashboard/'.$id.'/profile')->with('error','Password Salah');
    }
}
