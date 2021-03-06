<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Siswa;
use PDF;
use Intervention\Image\ImageManagerStatic as Image;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
    	if($request->has('cari')){
    		$data_siswa=Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();	
    	}else{
    		$data_siswa=Siswa::all();
    	}

    	return view('siswa.index',['data_siswa'=>$data_siswa,'link'=>'HiStudent | Siswa','active'=>'siswa','kelas'=>dataKelas()]);
    }

    public function create(Request $request)
    {
        
        $this->validate($request,[
            'nama_depan' => 'required|min:1',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
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
        $siswa = Siswa::create($request->all());

        if($request->hasFile('avatar')){
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();

            $image = $request->file('avatar');
            $filename= $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(120,120);
            $image_resize->save(public_path('images/'.$filename));
        }

    	return redirect('/siswa')->with('sukses','Data Disimpan');
    }

    public function edit(Siswa $siswa)
    {
    	return view('siswa.edit',['siswa'=>$siswa, 'link'=>'HiStudent | Siswa','active'=>'siswa','kelas'=>dataKelas()]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request,[
            'nama_depan' => 'required|min:1',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png'
        ]);

    	$siswa->update($request->all());
        if($request->hasFile('avatar')){
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();

            $image = $request->file('avatar');
            $filename= $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(120,120);
            $image_resize->save(public_path('images/'.$filename));
            // $image=$request->file('avatar');
            // $filename=$image->getClientOriginalName();
            // $path = public_path('images/'.$filename);
            // Image::make($image->getRealPath())->resize(100,100)->save($path);
            // $siswa->avatar=$filename;
        }
		return redirect('/siswa')->with('sukses','Data Berhasil Diupdate');
    }

    public function delete(Siswa $siswa)
    {
    	$siswa->delete();
    	return redirect('/siswa')->with('sukses','Data Berhasil Dihapus');
    }

    public function profile(Siswa $siswa)
    {
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

        return view('siswa.profile',['siswa'=>$siswa,'matapelajaran'=>$matapelajaran, 'categories'=>$categories,'data'=>$data,'link'=>'HiStudent | Siswa','active'=>'siswa']);
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa= Siswa::find($idsiswa);
        if ($siswa->mapel()->where('mapel_id',$request->matapelajaran)->exists()) {
            return redirect('/siswa/'.$idsiswa.'/profile')->with('error','Data Mata Pelajaran Sudah Ada');            
        }
        $siswa->mapel()->attach($request->matapelajaran, ['nilai'=>$request->nilai]);

        return redirect('/siswa/'.$idsiswa.'/profile')->with('sukses','Data Nilai Berhasil Dimasukan');
    }

    public function deletenilai(Siswa $siswa,$idmapel)
    {
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Data Nilai Berhasil Dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function exportPdf()
    {   
        $siswa=Siswa::all();
        $pdf = PDF::loadView('export.siswapdf', ['siswa'=>$siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function kelas($id)
    {
        $data_siswa=Siswa::where('kelas_id','LIKE','%'.$id.'%')->get();
        return view('siswa.index',['data_siswa'=>$data_siswa,'link'=>'HiStudent | Siswa','active'=>'siswa','kelas'=>dataKelas(),'lookAll'=>'true','id'=>$id]);
    }
}
