<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['nama','telepon','alamat','avatar','mapel_id'];

    public function mapel()
    {
    	// return $this->hasMany(Mapel::class);
    	return $this->belongsTo(Mapel::class);
    }

    public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.jpg');
    	}

    	return asset('images/'.$this->avatar);
    }

    public function exportMapel(){

    $guru = Guru::all();
    $mapel = $this->mapel->all();
    foreach ($mapel as $mp) {
        $export= $this->mapel()->where('id',$mp->id)->first()->mapel->nama;
    }
    return $export;
	}
}
