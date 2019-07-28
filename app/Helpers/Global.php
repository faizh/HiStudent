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

function dataSiswa()
{
    $siswa = \App\Siswa::all();
    return $siswa;
}

function dataKelas()
{
    return \App\Kelas::all();
}

function dataGuru()
{
    return \App\Guru::all();
}