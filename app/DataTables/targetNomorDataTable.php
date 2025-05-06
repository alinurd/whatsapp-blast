<?php

namespace App\DataTables;

use App\Models\Kategori;
use App\Models\Target;
use App\Models\MappingNomor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class targetNomorDataTable extends DataTable
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
            ->addColumn('campaign', function ($row) {
                return $row->campaign->nama ?? '-';
            })
            ->addColumn('nama_target', function ($row) {
                return $row->target->nama ?? '-';
            })
            ->addColumn('nomor', function ($row) {
                return $row->target->nomor ?? '-';
            })
            ->addColumn('ket', function ($row) {
                return $row->target->ket ?? '';
            })
            ->addColumn('push', function ($row) {
                return $row->target->push ?? 0;
            })
            ->addColumn('status', function ($row) {
                return $row->target->status == 0 ? 'Ready to Push' : 'Pusher';
            })
            ->addColumn('action', 'pesan.target.action')
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = MappingNomor::with(['campaign', 'target']);

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
            ['data' => 'campaign', 'name' => 'campaign.nama', 'title' => 'Campaign', 'class' => 'text-center'],
            ['data' => 'nama_target', 'name' => 'target.nama', 'title' => 'Nama Target', 'class' => 'text-center'],
            ['data' => 'nomor', 'name' => 'target.nomor', 'title' => 'Nomor', 'class' => 'text-center'],
            ['data' => 'ket', 'name' => 'target.ket', 'title' => 'Keterangan', 'class' => 'text-center'],
            ['data' => 'push', 'name' => 'target.push', 'title' => 'Jumlah Push', 'class' => 'text-center'],
            ['data' => 'status', 'name' => 'target.status', 'title' => 'Status', 'class' => 'text-center'],
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->width(60)
                ->addClass('text-center hide-search'),
        ];
    }
 
}
