<?php

namespace App\DataTables;

use App\Models\Kategori;
use App\Models\MapNomorCampaign;
use App\Models\Target;
use App\Models\MappingNomor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class targetNomorDataTable extends DataTable
{
    public function dataTable($query)
{
    return datatables()
        ->query($query)
        ->addColumn('DT_RowIndex', function ($row) {
            static $index = 0;
            return ++$index;
        })
        ->editColumn('target_status', function ($row) {
            return $row->target_status == 0 ? 'Ready to Push' : 'Pusher';
        })
        ->addColumn('action', 'pesan.target.action')
        ->rawColumns(['action']);
}

    public function query()
    {
        $query = \DB::table('targets as t')
            ->leftJoin('mapping_nomor as m', 'm.nomor_id', '=', 't.id')
            ->leftJoin('campign as c', 'c.id', '=', 'm.campign_id')
            ->selectRaw('
                t.id ,
                t.nomor,
                t.nama as target_nama,
                t.status as target_status,
                t.push,
                t.ket,
                t.created_by,
                t.created_at,
                t.updated_at,
                GROUP_CONCAT(c.nama ORDER BY c.nama ASC SEPARATOR ", ") as campaign_list
            ')
            ->groupBy(
                't.id', 't.nomor', 't.nama', 't.status', 't.push',
                't.ket', 't.created_by', 't.created_at', 't.updated_at'
            );
    
        return $query;
    }

    
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


    protected function getColumns()
    {
        return [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'No.', 'class' => 'text-center'],
            ['data' => 'nomor', 'name' => 'nomor', 'title' => 'Nomor', 'class' => 'text-center'],
            ['data' => 'push', 'name' => 'push', 'title' => 'Jumlah Push', 'class' => 'text-center'],
            ['data' => 'target_nama', 'name' => 'target_nama', 'title' => 'Nama Target', 'class' => 'text-center'],
            ['data' => 'campaign_list', 'name' => 'campaign_list', 'title' => 'Campaign', 'class' => 'text-center'],
            ['data' => 'target_status', 'name' => 'target_status', 'title' => 'Status', 'class' => 'text-center'],
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->width(60)
                ->addClass('text-center hide-search'),
        ];
    }
    
}
