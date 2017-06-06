<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class NetworkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $output = array();
        exec("traceroute 8.8.8.8", $output);
        $output=last($output);
        if ($output)
        {
        return view('network')->with('success',"connect network!");
        }
        else {
        return view('network')->with('dangerous',"not connect network!");
        }

    }

    public function wifi(Request $request)
    {
        $this->validate($request, [
          'wifiname' => 'required|',
          'wifipassword' => 'required|',
        ]);
        $name = $request -> get('wifiname');
        $password = $request -> get('wifipassword');

        $output = array();
        exec("echo '' | sudo -S python3 /var/www/html/dae_client/python/InternetSetting.py  3  '$name' '$password' ", $output);
        $output=last($output);
        return redirect()->back()->with('success', $output);
    }

    public function dhcp_()
    {
        $output = array();
        exec("echo '' | sudo -S python3 /var/www/html/dae_client/python/InternetSetting.py  1 ", $output);
        $output=last($output);
        return redirect()->back()->with('success', $output);
    }

    public function staticip()
    {
        $wan = $request -> get('wan');
        $dns = $request -> get('dns');
        $gateway = $request -> get('gateway');
        $mask = $request -> get('mask');
        $output = array();
        exec("echo '' | sudo -S python3 /var/www/html/dae_client/python/InternetSetting.py  2  '$wan' '$mask'  '$gateway' '$dns'", $output);
        $output=last($output);
        return redirect()->back()->with('success', $output);
    }
}
