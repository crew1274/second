<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Peak_time;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $peaks = Peak_time::orderBy('start', 'asc')->get();
        return view('config',compact('peaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start' => 'bail|required|date_format:H:m:s|time_conflict:day|include_check:end,day',
            'end' => 'bail|required|date_format:H:m:s|time_conflict:day|greater_check:start,day',
            'state' => 'bail|required|string',
            'day' => 'bail|required|string',
        ]);
        Peak_time::create($request->all());
        return redirect()->route('peaktime.index')
                        ->with('success','時間設定新增成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = Peak_time::find($id);
        return view('config_show',compact('config'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Peak_time::find($id);
        return view('config_edit',compact('config'));
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
        $this->validate($request, [
            'start' => 'bail|required|date_format:H:m:s|time_conflict_edit:{$id},day|include_check_edit:end,{$id},day',
            'end' => 'bail|required|date_format:H:m:s|time_conflict_edit:{$id},day|greater_check:start',
            'state' => 'bail|required|string',
            'day' => 'bail|required|string',
        ]);
        Peak_time::find($id)->update($request->all());
        return redirect()->route('peak_time.index')
                        ->with('success','時間設定更新成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peak_time::find($id)->delete();
       return redirect()->route('peaktime.index')
                       ->with('success','時間設定刪除成功!');
    }
}
