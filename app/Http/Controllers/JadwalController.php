<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        // CEK ERROR SENIN
    	for ($i=1; $i <11 ; $i++) { 
            $jadwal = Jadwal::find($i);
            if($jadwal->rpl1==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 di hari Senin Jam ke-'.$i.' KOSONG !!']);
           }elseif($jadwal->rpl2==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 di hari Senin Jam ke-'.$i.' KOSONG !!']);
           }elseif($jadwal->rpl3==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 di hari Senin Jam ke-'.$i.' KOSONG !!']);
           }elseif($jadwal->rpl4==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 4 di hari Senin Jam ke-'.$i.' KOSONG !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl2) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 2 di hari Senin Jam ke-'.$i.' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 3 di hari Senin Jam ke-'.$i.' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 4 di hari Senin Jam ke-'.$i.' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 3 di hari Senin Jam ke-'.$i.' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 4 di hari Senin Jam ke-'.$i.' sama !!']);
           }elseif ($jadwal->rpl3==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 & RPL 4 di hari Senin Jam ke-'.$i.' sama !!']);
           }
        }

        // CEK ERROR SELASA
        for ($i=11; $i <21 ; $i++) { 
            $jadwal = Jadwal::find($i);
            if($jadwal->rpl1==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 di hari Selasa Jam ke-'.($i-10).' KOSONG !!']);
           }elseif($jadwal->rpl2==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 di hari Selasa Jam ke-'.($i-10).' KOSONG !!']);
           }elseif($jadwal->rpl3==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 di hari Selasa Jam ke-'.($i-10).' KOSONG !!']);
           }elseif($jadwal->rpl4==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 4 di hari Selasa Jam ke-'.($i-10).' KOSONG !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl2) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 2 di hari Selasa Jam ke-'.($i-10).' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 3 di hari Selasa Jam ke-'.($i-10).' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 4 di hari Selasa Jam ke-'.($i-10).' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 3 di hari Selasa Jam ke-'.($i-10).' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 4 di hari Selasa Jam ke-'.($i-10).' sama !!']);
           }elseif ($jadwal->rpl3==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 & RPL 4 di hari Selasa Jam ke-'.($i-10).' sama !!']);
           }
        }

        // CEK ERROR RABU
        for ($i=21; $i <31 ; $i++) { 
            $jadwal = Jadwal::find($i);
            if($jadwal->rpl1==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 di hari Rabu Jam ke-'.($i-20).' KOSONG !!']);
           }elseif($jadwal->rpl2==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 di hari Rabu Jam ke-'.($i-20).' KOSONG !!']);
           }elseif($jadwal->rpl3==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 di hari Rabu Jam ke-'.($i-20).' KOSONG !!']);
           }elseif($jadwal->rpl4==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 4 di hari Rabu Jam ke-'.($i-20).' KOSONG !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl2) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 2 di hari Rabu Jam ke-'.($i-20).' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 3 di hari Rabu Jam ke-'.($i-20).' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 4 di hari Rabu Jam ke-'.($i-20).' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 3 di hari Rabu Jam ke-'.($i-20).' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 4 di hari Rabu Jam ke-'.($i-20).' sama !!']);
           }elseif ($jadwal->rpl3==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 & RPL 4 di hari Rabu Jam ke-'.($i-20).' sama !!']);
           }
        }

        // CEK ERROR KAMIS
        for ($i=31; $i <41 ; $i++) { 
            $jadwal = Jadwal::find($i);
            if($jadwal->rpl1==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 di hari Kamis Jam ke-'.($i-30).' KOSONG !!']);
           }elseif($jadwal->rpl2==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 di hari Kamis Jam ke-'.($i-30).' KOSONG !!']);
           }elseif($jadwal->rpl3==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 di hari Kamis Jam ke-'.($i-30).' KOSONG !!']);
           }elseif($jadwal->rpl4==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 4 di hari Kamis Jam ke-'.($i-30).' KOSONG !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl2) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 2 di hari Kamis Jam ke-'.($i-30).' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 3di hari Kamis Jam ke-'.($i-30).' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 4 di hari Kamis Jam ke-'.($i-30).' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 3 di hari Kamis Jam ke-'.($i-30).' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 4 di hari Kamis Jam ke-'.($i-30).' sama !!']);
           }elseif ($jadwal->rpl3==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 & RPL 4 di hari Kamis Jam ke-'.($i-30).' sama !!']);
           }
        }

        for ($i=41; $i <51 ; $i++) { 
            $jadwal = Jadwal::find($i);
            if($jadwal->rpl1==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 di hari Jumat Jam ke-'.($i-40).' KOSONG !!']);
           }elseif($jadwal->rpl2==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 di hari Jumat Jam ke-'.($i-40).' KOSONG !!']);
           }elseif($jadwal->rpl3==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 di hari Jumat Jam ke-'.($i-40).' KOSONG !!']);
           }elseif($jadwal->rpl4==null){
                return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 4 di hari Jumat Jam ke-'.($i-40).' KOSONG !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl2) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 2 di hari Jumat Jam ke-'.($i-40).' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 3di hari Jumat Jam ke-'.($i-40).' sama !!']);
           }elseif ($jadwal->rpl1==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 1 & RPL 4 di hari Jumat Jam ke-'.($i-40).' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl3) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 3 di hari Jumat Jam ke-'.($i-40).' sama !!']);
           }elseif ($jadwal->rpl2==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 2 & RPL 4 di hari Jumat Jam ke-'.($i-40).' sama !!']);
           }elseif ($jadwal->rpl3==$jadwal->rpl4) {
               return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'true','message'=>'Mata Pelajaran kelas RPL 3 & RPL 4 di hari Jumat Jam ke-'.($i-40).' sama !!']);
           }
        }


    	return view('jadwal.index',['link'=>'HiStudent | Jadwal Pelajaran','active'=>'jadwal','cek'=>'false']);
    }

    public function create(Request $request)
    {
    	$nama=$request->hari."".$request->jam;
    	$kelas=$request->kelas;

    	Jadwal::where('nama',$nama)->update(array($kelas => $request->mapel));

    	return redirect('/jadwal');
    }
}
