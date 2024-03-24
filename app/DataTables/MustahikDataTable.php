<?php

namespace App\DataTables;

use App\Models\Mustahik;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;  
use Yajra\DataTables\Services\DataTable;

class MustahikDataTable extends DataTable
{
     /** 
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        ->addColumn('DT_RowIndex', function ($row) {
            static $index = 0;
            return ++$index;
        })
        ->editColumn('rw_id', function($query) {
            if (!empty($query->rw_id)) {
                return $query->rw->rt . "/RW004";
            } elseif (!empty($query->wilayah_lain)) {
                return $query->wilayah_lain;
            } else {
                return 'Tidak ada informasi';
            }
        })
        ->editColumn('userProfile.country', function($query) {
            return $query->userProfile->country ?? '-';
        })
        ->editColumn('userProfile.company_name', function($query) {
            return $query->userProfile->company_name ?? '-';
        })
        ->editColumn('status', function($query) {
            $status = 'warning';
            switch ($query->status) {
                case 'active':
                    $status = 'primary';
                    break;
                case 'inactive':
                    $status = 'danger';
                    break;
                case 'banned':
                    $status = 'dark';
                    break;
            }
            return '<span class="text-capitalize badge bg-'.$status.'">'.$query->status.'</span>';
        })
        ->editColumn('created_at', function($query) {
            return date('Y/m/d',strtotime($query->created_at));
        })
        ->filterColumn('full_name', function($query, $keyword) {
            $sql = "CONCAT(users.first_name,' ',users.last_name)  like ?";
            return $query->whereRaw($sql, ["%{$keyword}%"]);
        })
        ->filterColumn('userProfile.company_name', function($query, $keyword) {
            return $query->orWhereHas('userProfile', function($q) use($keyword) {
                $q->where('company_name', 'like', "%{$keyword}%");
            });
        })
        ->filterColumn('userProfile.country', function($query, $keyword) {
            return $query->orWhereHas('userProfile', function($q) use($keyword) {
                $q->where('country', 'like', "%{$keyword}%");
            });
        })
        ->addColumn('action', 'mustahik.action')
        ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = Mustahik::query()
        ->join('kategori', 'mustahik.kategori_id', '=', 'kategori.id')
        ->select('mustahik.*', 'kategori.nama_kategori as kategori_name');

        return $this->applyScopes($model);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('dataTable')
                    ->columns($this->getColumns())
                    ->minifiedAjax() 
                    ->dom('<"row align-items-center"<"col-md-2" l><"col-md-6" B><"col-md-4"f>><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">')

                    ->parameters([
                        "processing" => true,
                        "autoWidth" => false,
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */ 
    protected function getColumns()
    {
        return [ 
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'No.', 'class' => 'text-center'],
            ['data' => 'rw_id', 'name' => 'rw_id', 'title' => 'Informasi Wilayah'], // Menambahkan kolom wilayah
            ['data' => 'code', 'name' => 'code', 'title' => 'Code'],
            ['data' => 'nama_lengkap', 'name' => 'nama_lengkap', 'title' => 'Nama'],
            ['data' => 'kategori_mustahik', 'name' => 'kategori_mustahik', 'title' => 'Kategori Mustahiq'],
            ['data' => 'kategori_name', 'name' => 'kategori_name', 'title' => 'Kategori Zakat diterima'], 
            ['data' => 'jumlah_uang_diterima', 'name' => 'jumlah_uang_diterima', 'title' => 'Jumlah Uang'],
            ['data' => 'jumlah_beras_diterima', 'name' => 'jumlah_beras_diterima', 'title' => 'Jumlah Beras'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center hide-search'),
        ];

        return $columns;

    }
 
}
 