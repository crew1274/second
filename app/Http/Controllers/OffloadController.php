<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class OffloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function off($id)
    {
        $contents = Storage::get('control.json');
        $json = json_decode($contents, true);
        $json['control'][$id-1]['available'] = false;
        
        $jsons = json_encode($json, true);
        Storage::delete('control.json');
        Storage::put('control.json', $jsons);
        return redirect('offload')->with('success','成功更新群組設定');
    }

    public function on($id)
    {
        $contents = Storage::get('control.json');
        $json = json_decode($contents, true);
        $json['control'][$id-1]['available'] = true;
        
        $jsons = json_encode($json, true);
        Storage::delete('control.json');
        Storage::put('control.json', $jsons);
        return redirect('offload')->with('success','成功更新群組設定');
    }

    public function index()
    {
        $last = Storage::get('control.json');
        return view('offload')->with('json', json_decode($last, true))->with('j', json_decode($last, true));
    }

}
