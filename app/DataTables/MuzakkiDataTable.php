<?php

namespace App\DataTables;

use App\Models\Muzakki;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;  
use Yajra\DataTables\Services\DataTable;

class MuzakkiDataTable extends DataTable
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
        ->addColumn('action', 'kategori.action')
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
        $model = Muzakki::query()
        ->join('users as muzakki_user', 'muzakki.user_id', '=', 'muzakki_user.id')
        ->join('kategori', 'muzakki.kategori_id', '=', 'kategori.id')
        ->join('muzakki_header', 'muzakki.code', '=', 'muzakki_header.code')
        ->join('users as header_user', 'muzakki_header.user_id', '=', 'header_user.id')
        ->select('muzakki.*', 'muzakki_user.nama_lengkap as user_name', 'kategori.nama_kategori as kategori_name', 'header_user.nama_lengkap As dibayarkan');
    
    

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
                    ->dom('<"row align-items-center"<"col-md-2" l><"col-md-6" B><"col-md-4"f>><"table-responsive my-3" rt><"row align-items-left" <"col-md-6" i><"col-md-6" p>><"clear">')

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
            ['data' => 'code', 'name' => 'id', 'title' => 'code', ], 
            ['data' => 'dibayarkan', 'name' => 'dibayarkan', 'title' => 'Di Bayarkan'], 
            ['data' => 'user_name', 'name' => 'user_name', 'title' => 'User'], 
            ['data' => 'kategori_name', 'name' => 'kategori_name', 'title' => 'Kategori'], 
            ['data' => 'type', 'name' => 'type', 'title' => 'Type Pembayaran'], 
            ['data' => 'jumlah_bayar', 'name' => 'jumlah_bayar', 'title' => 'Jumlah'], 
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center '),
        ];
    }
 
}
