<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Charts;

class RealtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function real()
    {
        //
        $chart= Charts::realtime(route('real_data'), 3000, 'line', 'highcharts')
            ->responsive(true)
            ->elementLabel("需量")
            ->height(300)
            ->width(0)
            ->title("需量即時監控")
            ->valueName('value')
            ->maxValues(30);
        return view('real', ['chart' => $chart]);
    }

    public function random()
    {
        //
        $chart= Charts::realtime(route('random_data'), 3000, 'area', 'highcharts')
            ->responsive(true)
            ->elementLabel("需量")
            ->height(300)
            ->width(0)
            ->title("需量即時監控")
            ->valueName('value')
            ->maxValues(30);
        return view('random', ['chart' => $chart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
