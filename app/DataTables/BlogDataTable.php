<?php

namespace App\DataTables;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
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
                $edit = "<a href='".route('admin.blogs.edit',$query->id)."' class='btn btn-primary'><i class='fa fa-edit'></i></a>";
                $delete = "<a href='".route('admin.blogs.destroy',$query->id)."' class='delete-item btn btn-danger ml-2'><i class='fa fa-trash'></i></a></a>";
                return $edit.$delete;
            })
            ->addColumn('image',function($query){
                return '<img width="75px" src="'.asset($query->image).'">';
            })
            ->addColumn('category',function($query){
                return $query->category->name;
            })
            ->addColumn('title', function($query){
                return truncate($query->title,50);
            })
            ->addColumn('description', function($query){
                return truncate($query->description,80);
            })
            ->addColumn('author',function($query){
                return $query->user->name;
            })
            ->addColumn('status',function($query){
                if($query->status === 1){
                    return '<span class="badge badge-primary">Yes</span>';
                }else{
                    return '<span class="badge badge-danger">No</span>';
                }
            })
            ->rawColumns(['action','image','status','author'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Blog $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('blog-table')
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
            Column::make('title'),         
            Column::make('image'),         
            Column::make('category'),         
            Column::make('author'),         
            Column::make('description'),         
            Column::make('seo_title'),         
            Column::make('seo_description'),         
            Column::make('status'),         
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
        return 'Blog_' . date('YmdHis');
    }
}
