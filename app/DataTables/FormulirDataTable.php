<?php

namespace App\DataTables;

use App\Models\FormulirParent;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FormulirDataTable extends DataTable
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
        ->addColumn('kategori_nama_kategori', function ($row) {
            return $row->kategori->nama_kategori;
        })
        ->addColumn('action', 'formulir.action')
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
        $model = FormulirParent::query();
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
            Column::computed('kategori_nama_kategori')
                ->title('Nama Kategori')
                ->orderable(true)
                ->searchable(true)
                ->width(100)
                ->addClass('text-center'),
            ['data' => 'nama', 'name' => 'nama', 'title' => 'Nama Form', 'class' => 'text-center'],
            ['data' => 'deskripsi', 'name' => 'deskripsi', 'title' => 'Deskripsi', 'class' => 'text-center'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center hide-search'),
        ];
    }
 
}
