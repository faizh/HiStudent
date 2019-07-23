<?php

function rangkingParalel()
{
	$siswa=\App\Siswa::all();
    	// USE HELPER
    	$siswa->map(function($s){
    		$s->rataRataNilai = $s->rataRataNilai();
    		return $s;
    	});
    	$siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
    	return $siswa;
}

function totalSiswa()
{
	return \App\Siswa::count();
}

function totalGuru()
{
	return \App\Guru::count();
}

function dataMapel()
{
    $mapel = \App\Mapel::all();
    return $mapel;
}

function exportMapel(){
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