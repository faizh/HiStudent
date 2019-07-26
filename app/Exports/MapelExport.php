<?php

namespace App\Exports;

use App\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MapelExport implements FromView
{
    public function view(): View
    {
        $guru=\App\Guru::all();
        return view('export.mapelexcel', ['mapel' => Mapel::all(),'guru'=>$guru]);
    }
}