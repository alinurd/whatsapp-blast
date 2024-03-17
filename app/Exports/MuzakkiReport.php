<?php

namespace App\Exports;

use App\Models\Muzakki;
use App\Models\MuzakkiHeader;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Concerns\WithHeadings;

class MuzakkiReport implements FromCollection, WithHeadings{
    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function collection()
    {
        $detail = Muzakki::with('user', 'kategori')->get();
        $header = MuzakkiHeader::with('user')->get();

        $data = [];
        $totals = [];
        $no=1;
        foreach ($detail as $item) {
            foreach ($header as $h) {
                if ($item->code == $h->code) {
                    $jumlah_bayar = str_replace(',', '.', $item->jumlah_bayar);
                    $jumlah_bayar = floatval($jumlah_bayar);

                    if (is_numeric($jumlah_bayar)) {
                        $satuan = $item->satuan;

                        if (!isset($totals[$satuan])) {
                            $totals[$satuan] = 0;
                        }

                        $totals[$satuan] += $jumlah_bayar;
                        
                        $data[] = [
                            'No' => $no++,
                            'Code Invoice' => $item->code,
                            'Tanggal' => $h->created_at,
                            'Dibayarkan Oleh' => $h->user->nama_lengkap,
                            'Nama' => $item->user->nama_lengkap,
                            'Kategori' => $item->kategori->nama_kategori,
                            'Type' => $item->type,
                            'Satuan' => $satuan,
                            'Jumlah' => $jumlah_bayar,
                        ];
                    } else {
                        // Lakukan penanganan jika $jumlah_bayar bukan numerik 
                        // Contoh: set nilai $jumlah_bayar ke 0 atau lakukan tindakan lain
                        $jumlah_bayar = 0;
                    }
                }
            }
        }

        // Tambahkan total berdasarkan satuan ke data
        foreach ($totals as $satuan => $total) {
            $data[] = [
                'No' => '',
                'Code Invoice' => '',
                'Tanggal' => '',
                'Dibayarkan Oleh' => '',
                'Nama' => '',
                'Kategori' => '',
                'Type' => 'Total',
                'Satuan' => $satuan,
                'Jumlah' => $total,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'No',
            'Code Invoice',
            'Tanggal',
            'Dibayarkan Oleh',
            'Nama',
            'Kategori',
            'Type',
            'Satuan',
            'Jumlah',
        ];
    }
 
    public function muzakkireport(){
        return Excel::download(New MuzakkiReport, "Muzakki-Report-".date("Y").".xlsx");

    }
    
    public function index() 
    {
        
        $data['detail'] = Muzakki::with('user','kategori' )->get();
        $data['header'] = MuzakkiHeader::with('user' )->get();
 
        return view('muzakki.report', compact('data'));
    }

}


