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
    public function __construct($jawaban, $formulirOption, $formulir, $jwbFilter)
    {
        $this->jawaban = $jawaban;
        $this->formulirOption = $formulirOption;
        $this->formulir = $formulir;
        $this->jwbFilter = $jwbFilter;
    }

    public function view(): View
    {
        return view('formulir.excel', [
            'jawaban' => $this->jawaban,
            'formulirOption' => $this->formulirOption,
            'formulir' => $this->formulir,
            'jwbFilter' => $this->jwbFilter,
        ]);
        
    }
}
