<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\Kategori;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
        ->editColumn('kategori_id', function($query) {
            if (!empty($query->kategori_id)) {
                return $query->kategori->nama_kategori;
            } else {
                return '-';
            }
        })
        ->addColumn('gambar', function($query) {
            $url = $query->gambar ? asset('storage/' . $query->gambar) : asset('images/no-image.jpg');
            return '<img src="'.$url.'" border="0" width="80" class="img-rounded" align="center" />';
        })
        ->addColumn('action', 'product.action')
        ->rawColumns(['action', 'gambar']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $model = Product::query();
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
            ['data' => 'gambar', 'name' => 'gambar', 'title' => 'Foto Product', 'class' => 'text-center'],
            ['data' => 'kategori_id', 'name' => 'kategori_id', 'title' => 'Kategori', 'class' => 'text-center'],
            ['data' => 'jenis_produk', 'name' => 'jenis_produk', 'title' => 'Jenis Product', 'class' => 'text-center'],
            ['data' => 'nama_product', 'name' => 'nama_product', 'title' => 'Nama Product', 'class' => 'text-center'],
            ['data' => 'desk_detail', 'name' => 'desk_detail', 'title' => 'Detail Product', 'class' => 'text-center'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center hide-search'),
        ];
    }
 
}
