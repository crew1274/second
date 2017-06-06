<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use App\Offload;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $contents = Storage::get('control.json');
        return view('control')->with('json', json_decode($contents, true));
    }

    public function switch(Request $request)
    {
        $contents = Storage::get('control.json');
        $json = json_decode($contents, true);
        $request=$request->input('id');
                if( $json['control'][$request-1]['boolean'] == false )
                {
                    
                    exec("sudo python3 /var/www/html/real_time/python/switch.py '{$request}' 1");
                    $json['control'][$request-1]['boolean'] = true;
                }
                else
                {
                    exec("sudo python3 /var/www/html/real_time/python/switch.py '{$request}' 0");
                    $json['control'][$request-1]['boolean'] = false;
                }

        $jsons = json_encode($json, true);
        Storage::delete('control.json');
        Storage::put('control.json', $jsons);
        //Storage::append('control.json', $request);
        if( $json['control'][$request-1]['boolean'] == false)
             {return response()->json(array('state' =>  '切換成關'));}
        else {return response()->json(array('state' =>  '切換成開'));}

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
