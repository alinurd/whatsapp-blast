<?php
use App\Exports\MuzakkiReportExport;
use Maatwebsite\Excel\Facades\Excel;

public function exportMuzakkiReport()
{
    return Excel::download(new MuzakkiReportExport, 'Muzakki-Report.xlsx');
}
