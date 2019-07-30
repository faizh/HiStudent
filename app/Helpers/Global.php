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

function totalMapel()
{
    return \App\Mapel::count();
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
    if ($hari=='Mon') {
        return \App\Jadwal::all()->take(10);
    }elseif ($hari=='Tue') {
        return \App\Jadwal::skip(10)->take(10)->get();
    }elseif ($hari=='Wed') {
        return \App\Jadwal::skip(20)->take(10)->get();
    }elseif ($hari=='Thu') {
        return \App\Jadwal::skip(30)->take(10)->get();
    }elseif ($hari=='Fri') {
        return \App\Jadwal::skip(40)->take(10)->get();
    }else{
        return \App\Jadwal::all()->take(10);
    }
}

function namaHari(){
    $hari=date('D');
    if ($hari=="Mon") {
        return "Senin";
    }elseif ($hari=="Tue") {
        return "Selasa";
    }elseif ($hari=="Wed") {
        return "Rabu";
    }elseif ($hari=="Thu") {
        return "Kamis";
    }elseif ($hari=="Fri") {
        return "Jumat";
    }else{
        return "Senin";
    }
}