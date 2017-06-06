<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Offload;

class OffloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function off($id)
    {
        $last=offload::all() -> last();
        $id= 'group'.$id;
        $last -> $id = false;
        $last -> total ++;
        $last->save();

        $last=offload::all() -> last();
        return redirect('offload')
        ->with('success','成功更新群組設定');
    }

    public function on($id)
    {
        $last=offload::all() -> last();
        $id= 'group'.$id;
        $last -> $id = true;
        $last -> total ++;
        $last->save();

        $last=offload::all() -> last();
        return redirect('offload')
        ->with('success','成功更新群組設定');
    }

    public function index()
    {
        $last=offload::all() ->last();
        return view('offload',compact('last'));
    }



}
