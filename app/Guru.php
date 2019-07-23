<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['nama','telepon','alamat','avatar'];

    public function mapel()
    {
    	// return $this->hasMany(Mapel::class);
    	return $this->hasMany(Mapel::class);
    }

    public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.jpg');
    	}

    	return asset('images/'.$this->avatar);
    }

    public function exportMapel(){
    $guru = \App\Guru::all();
    $mapel = \App\Guru::all();
    foreach ($guru as $g) {
        foreach ($mapel as $mp) {
            if ($mp->id==$g->mapel_id) {
                $export = $mp->nama;
            }
        }
    }
    return $export;
	}
}
