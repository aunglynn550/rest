<?php

namespace App\DataTables;

use App\Models\BannerSlider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BannerSliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $edit = "<a href='".route('admin.banner-slider.edit',$query->id)."' class='btn btn-primary'><i class='fa fa-edit'></i></a>";
                $delete = "<a href='".route('admin.banner-slider.destroy',$query->id)."' class='delete-item btn btn-danger ml-2'><i class='fa fa-trash'></i></a></a>";
                return $edit.$delete;
            })
            ->addColumn('banner',function($query){
                return '<img width="100px" src="'.asset($query->banner).'">';
            })
            ->rawColumns(['action','banner'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BannerSlider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bannerslider-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(100),    
            Column::make('banner')->width(200),    
            Column::make('title'),    
            Column::make('url'),    
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BannerSlider_' . date('YmdHis');
    }
}
