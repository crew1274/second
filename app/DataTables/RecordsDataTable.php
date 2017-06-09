<?php

namespace App\DataTables;

use App\Demand_record;

use Yajra\Datatables\Services\DataTable;

class RecordsDataTable extends DataTable
{
    // protected $printPreview  = 'path-to-print-preview-view';
    protected $exportColumns = ['id', 'value','circuit','created_at	'];
    // protected $printColumns  = '*';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->of($this->query())
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $records = Demand_record::select();

        return $this->applyScopes($records);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns([
                'id','value','circuit','created_at',
            ])
            ->ajax('')
            ->parameters([
                
            ]);
    }
}
