<?php

namespace App\DataTables;

use App\Models\Kategori;
use App\Models\Target;
use App\Models\Campaign;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class campaignNomorDataTable extends DataTable
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
        ->addColumn('status', function($query) {
            if($query->status==0){
                $t="Ready to Push";
                $b="primary";
            }else{
                $t="Pusher";
                $b="primary";
            }
            return $t;
        })
        ->addColumn('action', 'pesan.campaign.action')
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
        $model = Campaign::query();
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
            ['data' => 'kode', 'name' => 'kode', 'title' => 'kode', 'class' => 'text-center'],
            ['data' => 'nama', 'name' => 'nama', 'title' => 'Nama Campaign', 'class' => 'text-center'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center hide-search'),
        ];
    }
 
}
