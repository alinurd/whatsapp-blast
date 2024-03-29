<?php


namespace App\Exports;

use App\Models\Mustahik;
use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MustahikReport implements FromCollection, WithHeadings, WithMapping{
    /** 
    * @return \Illuminate\Support\Collection
    */  

    protected $data; 
    protected $row = 0;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Informasi Wilayah',
            'Code Invoice',
            'Tanggal',
            'Nama',
            'Jenis Kelamin',
            'No Hp',
            'Status Perkawinan',
            'Alamat',
            'Pekerjaan',
            'Jumlah Pendapatan',
            'Jumlah Anak dlm Tanggungan',
            'Jumlah Bansos Diterima',
            'Status Tempat Tinggal',
            'Pengeluaran Listrik',
            'Pengeluaran Listrik&Kontrakan',
            'Jumlah Hutang',
            'Keperluan Hutang',
            'Kategori Mustahiq',
            'Kategori Zakat Diterima',
            'Jumlah Uang Diterima',
            'Jumlah Beras Diterima',
            'Keterangan',
        ];  
    }

    public function map($mustahik): array
    {
        $this->row++; // Increment nomor setiap kali memetakan data baru

        // Tentukan nilai untuk kolom Informasi Wilayah berdasarkan filter
        $informasi_wilayah = '';
        if ($mustahik->rw_id || $mustahik->wilayah_lain) {
            if ($mustahik->rw_id) {
                $informasi_wilayah = $mustahik->rw->rt . '/RW004';
            } else {
                $informasi_wilayah = $mustahik->wilayah_lain;
            }
        } else {
            $informasi_wilayah = 'Tidak ada informasi';
        }

        // Cek apakah alamat kosong atau tidak, jika kosong ganti dengan "-"
        $alamat = !empty($mustahik->alamat) ? $mustahik->alamat : '-';
        $keperluan_hutang = !empty($mustahik->keperluan_hutang) ? $mustahik->keperluan_hutang : '-';
        $keterangan = !empty($mustahik->keterangan) ? $mustahik->keterangan : '-';

        // Format jumlah rupiah
        $jumlah_pendapatan = 'Rp' . number_format(floatval($mustahik->jumlah_pendapatan), 0, ',', '.');
        $jumlah_bansos_diterima = 'Rp' . number_format(floatval($mustahik->jumlah_bansos_diterima), 0, ',', '.');
        $jumlah_pengeluaran_listrik = 'Rp' . number_format(floatval($mustahik->pengeluaran_listrik), 0, ',', '.');
        $jumlah_pengeluaran_kontrakan = 'Rp' . number_format(floatval($mustahik->pengeluaran_kontrakan), 0, ',', '.');
        $jumlah_hutang = 'Rp' . number_format(floatval($mustahik->jumlah_hutang), 0, ',', '.');
        $jumlah_uang_diterima = 'Rp' . number_format(floatval($mustahik->jumlah_uang_diterima), 0, ',', '.');

        // Gabungkan jumlah beras diterima dengan satuan beras
        $beras_dan_satuan = $mustahik->jumlah_beras_diterima . ' ' . $mustahik->satuan_beras;

        return [
            $this->row, // Nomor berurutan
            $informasi_wilayah,
            $mustahik->code,
            $mustahik->tanggal,
            $mustahik->nama_lengkap, 
            $mustahik->jenis_kelamin,
            $mustahik->nomor_telp,
            $mustahik->status_perkawinan,
            $alamat,
            $mustahik->pekerjaan,
            $jumlah_pendapatan,
            $mustahik->jumlah_anak_dalam_tanggungan,
            $jumlah_bansos_diterima,
            $mustahik->status_tempat_tinggal, 
            $jumlah_pengeluaran_listrik,
            $jumlah_pengeluaran_kontrakan,
            $jumlah_hutang,
            $keperluan_hutang,
            $mustahik->kategori_mustahik,
            $mustahik->kategori->nama_kategori,
            $jumlah_uang_diterima,
            $beras_dan_satuan,
            $keterangan,
        ];
    }
 
    public function mustahikreport(Request $request){
        // Filter berdasarkan wilayah jika dipilih
        $query = Mustahik::query()
        ->where('status', '=', '2');
        
        if ($request->filled('rt_rw')) {
            $rt_rw = $request->input('rt_rw');
            if ($rt_rw == 'lainnya') {
                $query->whereNotNull('wilayah_lain');
            } else {
                $query->where('rw_id', $rt_rw);
            }
        }

        // Ambil data sesuai filter
        $filteredData = $query->get();

        // Buat objek MustahikReport dengan data yang difilter
        $mustahikReport = new MustahikReport($filteredData);

        // Ekspor ke Excel
        return Excel::download($mustahikReport, "Mustahik-Report-" . date("Y") . ".xlsx");
    }
    
    public function index(Request $request) 
    {
        // $data['detail'] = Mustahik::all();
 
        // return view('mustahik.report', compact('data'));

        $query = Mustahik::query()
        ->where('status', '=', '2');

        // Filter berdasarkan wilayah jika dipilih
        if ($request->has('rt_rw')) { 
            $rt_rw = $request->input('rt_rw');

            // Jika "lainnya" dipilih, atur kondisi sesuai kebutuhan Anda
            if ($rt_rw == 'lainnya') { 
                $query->whereNotNull('wilayah_lain');
            } else {  
                $query->where('rw_id', $rt_rw);
            }
        }

        $data['detail'] = $query->get();

        return view('mustahik.report', compact('data'));
    }

} 