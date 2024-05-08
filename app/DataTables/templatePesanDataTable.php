<?php

namespace App\DataTables;

use App\Models\Kategori;
use App\Models\Template;
use App\Models\TemplateView;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class templatePesanDataTable extends DataTable
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
        ->addColumn('action', 'pesan.template.action')
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
        $model = TemplateView::query();
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
            ['data' => 'nama_kategori', 'name' => 'nama_kategori', 'title' => 'Kategori', 'class' => 'text-center'],
            ['data' => 'nama_template', 'name' => 'nama_template', 'title' => 'Nama Template', 'class' => 'text-center'],
            ['data' => 'created_by', 'name' => 'created_by', 'title' => 'Created By', 'class' => 'text-center'],
            // ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created at', 'class' => 'text-center'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center hide-search'),
        ];
    }
 
}
