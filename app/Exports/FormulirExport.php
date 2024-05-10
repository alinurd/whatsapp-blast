<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FormulirExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($formulir, $formulirOption)
    {
        $this->formulir = $formulir;
        $this->formulirOption = $formulirOption;
    }

    public function view(): View
    {
        return view('formulir.excel', [
            'jawaban' => $this->formulir,
            'formulirOption' => $this->formulirOption,
        ]);
    }
}
