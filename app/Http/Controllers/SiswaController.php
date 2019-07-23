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
        $this->validate($request,[
            'nama_depan' => 'required|min:3',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png'
        ]);

        $user = new \App\User;
        $user->level='siswa';
        $user->name=$request->nama_depan;
        $user->email=$request->email;
        $user->password=bcrypt('rahasia');
        $user->remember_token=str_random(24);
        $user->save();

        $request->request->add(['user_id'=>$user->id]);
        $siswa = \App\Siswa::create($request->all());

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

    	return redirect('/siswa')->with('sukses','Data Disimpan');
    }

    public function edit($id)
    {
    	$siswa=\App\Siswa::find($id);
    	return view('siswa.edit',['siswa'=>$siswa]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_depan' => 'required|min:3',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png'
        ]);

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

        return view('siswa.profile',['siswa'=>$siswa,'matapelajaran'=>$matapelajaran, 'categories'=>$categories,'data'=>$data]);
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa=\App\Siswa::find($idsiswa);
        if ($siswa->mapel()->where('mapel_id',$request->matapelajaran)->exists()) {
            return redirect('/siswa/'.$idsiswa.'/profile')->with('error','Data Mata Pelajaran Sudah Ada');            
        }
        $siswa->mapel()->attach($request->matapelajaran, ['nilai'=>$request->nilai]);

        return redirect('/siswa/'.$idsiswa.'/profile')->with('sukses','Data Nilai Berhasil Dimasukan');
    }

    public function deletenilai($idsiswa,$idmapel)
    {
        $siswa=\App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Data Nilai Berhasil Dihapus');
    }
}
