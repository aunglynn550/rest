<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TestimonialDataTable extends DataTable
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
            $edit = "<a href='".route('admin.testimonial.edit',$query->id)."' class='btn btn-primary'><i class='fa fa-edit'></i></a>";
            $delete = "<a href='".route('admin.testimonial.destroy',$query->id)."' class='delete-item btn btn-danger ml-2'><i class='fa fa-trash'></i></a></a>";
            return $edit.$delete;
        })->addColumn('image',function($query){
            return '<img width="75px" src="'.asset($query->image).'">';
        })->addColumn('show_at_home',function($query){
            if($query->show_at_home === 1){
                return '<span class="badge badge-primary">Yes</span>';
            }else{
                return '<span class="badge badge-danger">No</span>';
            }
        })->addColumn('status',function($query){
            if($query->status === 1){
                return '<span class="badge badge-primary">Active</span>';
            }else{
                return '<span class="badge badge-danger">Inactive</span>';
            }
        })   
        ->rawColumns(['image','action','show_at_home','status'])     
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Testimonial $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('testimonial-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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
            Column::make('id'),
            Column::make('image'),           
            Column::make('name'),           
            Column::make('rating'),           
            Column::make('review'),           
            Column::make('show_at_home'),           
            Column::make('status'),           
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(90)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Testimonial_' . date('YmdHis');
    }
}