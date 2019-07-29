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

function dataJadwal($hari)
{
    if ($hari=='senin') {
        return \App\Jadwal::all()->take(10);
    }elseif ($hari=='selasa') {
        return \App\Jadwal::skip(10)->take(10)->get();
    }elseif ($hari=='rabu') {
        return \App\Jadwal::skip(20)->take(10)->get();
    }elseif ($hari=='kamis') {
        return \App\Jadwal::skip(30)->take(10)->get();
    }elseif ($hari=='jumat') {
        return \App\Jadwal::skip(40)->take(10)->get();
    }
}