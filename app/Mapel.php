<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table ='mapel';
    protected $fillable = ['kode','nama','semester'];

    public function siswa()
    {
    	return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }

    public function guru()
    {
    	// return $this->belongsTo(Guru::class);
        return $this->hasMany(Guru::class);
    }

    public function exportGuru()
    {
        $mapel = \App\Mapel::all();
        $guru = \App\Guru::all();

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
