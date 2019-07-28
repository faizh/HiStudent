<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama','guru_id'];

    public function guru()
    {
    	return $this->belongsTo(Guru::class);
    }

    public function kelasSiswa()
    {
    	$kelas=Kelas::all();
    	$siswa=\App\Siswa::all();
    	$count=0;

    	foreach ($kelas as $k) {
    		foreach ($siswa as $s) {
    			if ($s->kelas_id==$k->id) {
    				$count++;
    			}
    		}
    	}

    	return $count;
    }
}
