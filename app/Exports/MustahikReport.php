<?php

namespace App\Exports;

use App\Models\Mustahik;
use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Concerns\WithHeadings;

class MustahikReport implements FromCollection, WithHeadings{
    /**
    * @return \Illuminate\Support\Collection
    */ 

    public function collection()
    {
        $mustahiks = Mustahik::all();
        $ktg = Kategori::pluck('nama_kategori', 'id');

        $data = [];
        $no = 1;
    
        foreach ($mustahiks as $mustahik) {
            $data[] = [
                'No' => $no++,
                'Code' => $mustahik->code,
                'Tanggal' => $mustahik->tanggal,
                'Nama' => $mustahik->nama_lengkap,
                'Jenis Kelamin' => $mustahik->jenis_kelamin,
                'Nomor Telepon' => $mustahik->nomor_telp,
                'Status Perkawinan' => $mustahik->status_perkawinan,
                'RT/RW' => $mustahik->rt_rw,
                'Wilayah Lain' => $mustahik->wilayah_lain,
                'Alamat' => $mustahik->alamat,
                'Pekerjaan' => $mustahik->pekerjaan,
                'Jumlah Pendapatan' => $mustahik->jumlah_pendapatan,
                'Jumlah Anak Dalam Tanggungan' => $mustahik->jumlah_anak_dalam_tanggungan,
                'Jumlah Bansos Diterima' => $mustahik->jumlah_bansos_diterima,
                'Status Tempat Tinggal' => $mustahik->status_tempat_tinggal,
                'Pengeluaran Listrik' => $mustahik->pengeluaran_listrik,
                'Pengeluaran Kontrakan' => $mustahik->pengeluaran_kontrakan,
                'Jumlah Hutang' => $mustahik->jumlah_hutang,
                'Keperluan Hutang' => $mustahik->keperluan_hutang,
                'Kategori Mustahiq' => $mustahik->kategori_mustahik,
                'Kategori ID' => $mustahik->kategori->nama_kategori,
                'Jumlah Uang Diterima' => $mustahik->jumlah_uang_diterima,
                'Jumlah Beras Diterima' => $mustahik->jumlah_beras_diterima,
                'Satuan Beras' => $mustahik->satuan_beras,
                'Keterangan' => $mustahik->keterangan,
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
            'Nama',
            'Jenis Kelamin',
            'No Hp',
            'Status Perkawinan',
            'RT/RW',
            'Wilayah Lain',
            'Alamat',
            'Pekerjaan',
            'Jumlah Pendapatan',
            'Jumlah Anak dlm Tanggungan',
            'Jumlah Bansos Diterima',
            'Status Tempat Tinggal',
            'Pengeluaran Listrik',
            'Pengeluaran Kontrakan',
            'Jumlah Hutang',
            'Keperluan Hutang',
            'Kategori Mustahiq',
            'Kategori Zakat Diterima',
            'Jumlah Uang Diterima',
            'Jumlah Beras Diterima',
            'Satuan Beras',
            'Keterangan',
        ];  
    }
 
    public function mustahikreport(){
        return Excel::download(New MustahikReport, "mustahik-Report-".date("Y").".xlsx");

    }
    
    public function index() 
    {
        
        $data['detail'] = Mustahik::all();
 
        return view('mustahik.report', compact('data'));
    }

}


