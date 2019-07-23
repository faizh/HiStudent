<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id'];

    public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.jpg');
    	}

    	return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
    	return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rataRataNilai()
    {   
        $mapel=$this->mapel->all();
        $aknilai=0;
        $looping=0;
        foreach ($mapel as $mp) {
            $nilai = $this->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            $aknilai=$aknilai+$nilai;
            $looping++;
        }
        return round($aknilai/$looping);
    }

    public function jumlahMapel()
    {
        $mapel=$this->mapel->all();
        $looping=0;
        foreach ($mapel as $mp) {
            $looping++;
        }
        return $looping;
    }

    public function namaLengkap()
    {
        return $this->nama_depan." ".$this->nama_belakang;
    }
}
