<?php

namespace App\Exports;

use App\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuruExport implements FromView
{
    public function view(): View
    {
        $mapel = \App\Mapel::all();
        return view('export.guruexcel', ['guru' => Guru::all(),'mapel'=>$mapel]);
    }
}