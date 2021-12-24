<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{

    protected function url()
    {
        return route('ajax.users');
    }
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
            ->startsWithSearch()
            ->setRowId('idx')
            ->addIndexColumn()
             ->addColumn('name',function($query){
                if(!is_null($query->name)){
                    return $query->name;
                } 
            })
            ->addColumn('username',function($query){
                if(!is_null($query->username)){
                    return $query->username;
                } 
            })
            ->addColumn('email',function($query){
                if(!is_null($query->email)) {
                    return $query->email;
                }
            })
            ->addColumn('kode_pegawai',function($query){
                if(!is_null($query->kode_pegawai)) {
                    return $query->kode_pegawai;
                }
            })
            ->addColumn('action', function ($query) {
                return view('datatables._action-user', [
                    'idx' => $query->id,
                    'name' => $query->name,
                ]);
            })
            ->editColumn('status', function ($query) {
                if ($query->status == 1) {
                    return '<span class="badge badge-success">AKTIF</span>';
                } else {
                    return '<span class="badge badge-primary">NONAKTIF</span>';
                }
            })
            ->rawColumns(['status', 'action'])
            ->toJson();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query($query)
    {
       return $query->addSelect(
            'id',
            'name',
            'username',
            'email',
            'kode_pegawai',
            'status'
        );
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
         return $this->builder()
            ->setTableId('tabel-users')
            ->addTableClass('table-hover')
            ->columns($this->getColumns())
            ->minifiedAjax($this->url(), null, [
                'status' => "function(){  return $('select#status').val(); }",
                'term'   => "function(){ return $('input#term').val(); }",
            ])
            ->parameters([
                'pageLength' => 25,
                'processing' => true,
                'serverSide' => true,
                'responsive' => true,
                'dom'        => '<t<p >>',
                'destroy'   => true,
                'autoWidth' => false,
                'language' => [
                    'lengthMenu' => '_MENU_',
                    'info' => 'Menampilkan <b>_START_ sampai _END_</b> dari _TOTAL_ data',
                    'zeroRecords' => 'Tidak ada data',
                    'emptyTable' => 'Data tidak tersedia',
                    'loadingRecords' => '<img src="' . asset('ajax-loader.gif') . ' Loading...',
                ],

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
            Column::computed('DT_RowIndex')->searchable(false)->title('#'),
            Column::make('name')->title('Nama'),
            Column::make('username')->title('Username'),
            Column::make('email')->title('Email'),
            Column::make('kode_pegawai')->title('Kode Pegawai'),
            Column::make('status')->searchable(false)->title('Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center text-nowrap'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
