<?php

namespace App\Imports;

use App\Models\Target;
use App\Models\Campaign;
use App\Models\MappingNomor;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NomorTargetImport implements ToCollection, WithHeadingRow
{
    public $imported = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $nomor = trim($row['nomor']);

            // Cek apakah nomor sudah ada
            $existingNomor = Target::where('nomor', $nomor)->first();

            if ($existingNomor) {
                // Jika nomor sudah ada, hanya mapping
                $nomorTarget = $existingNomor;
                $status = 'nomor duplikat, hanya mapping';
            } else {
                // Nomor belum ada, simpan data baru
                $nomorTarget = Target::create([
                    'nomor' => $nomor,
                    'nama' => $row['nama'],
                    'ket' => $row['ket'],
                ]);
                $status = 'data baru dan mapping';
            }

            // Bersihkan kode campaign
            $kodeCampaign = str_replace(' ', '-', trim($row['kode_campaign']));

            // Cek atau buat campaign
            $campaign = Campaign::firstOrCreate([
                'kode' => $kodeCampaign
            ], [
                'nama' => $row['kode_campaign'],
            ]);

            // Buat mapping jika belum ada
            $map = MappingNomor::firstOrCreate([
                'nomor_id' => $nomorTarget->id,
                'campign_id' => $campaign->id,
            ]);

            // Simpan data ke array untuk ditampilkan
            $this->imported[] = [
                'nomor' => $nomor,
                'nama' => $nomorTarget->nama,
                'ket' => $nomorTarget->ket,
                'campaign' => $campaign->kode,
                'mapping_id' => $map->id,
                'status' => $status,
            ];
        }

        // Kirim ke session agar bisa ditampilkan di view
        Session::flash('imported_data', $this->imported);
    }
}
