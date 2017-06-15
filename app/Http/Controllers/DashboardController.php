<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Charts;
use App\Location;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function respond()
    {
     $payload = json_encode(
        [
            'uid' => env('UUID'),
            'email' => Auth::user()->email,
            'name'=> Auth::user()->name,
            'timestamp' => Carbon::now()
        ]);
    
     $client = new Client([
        'base_uri' => 'http://140.116.39.171:5000/api/v1.0/', 'timeout'  => 2.0,]
        );

    $r = $client->request('POST', 'demand', [
        //'json' => $payload,
        'body' => $payload
    ]);
    
    return redirect('dashboard');
    }

    public function index()
    {
        $chart= Charts::realtime(route('real_data'), 3000, 'line', 'highcharts')
            ->responsive(true)
            ->elementLabel(trans('dashboard.value'))
            ->height(300)
            ->width(0)
            ->colors(['#2196F3'])
            ->title(trans('dashboard.realtime'))
            ->valueName('value');
        
        $location = Location::all() -> last();
        if($location==null)
        {$sunset = trans('dashboard.null');
         $sunrise = trans('dashboard.null');
         $rawOffset = trans('dashboard.null');
         $timeZoneId= trans('dashboard.null');
        }
        else{
        $timeZoneId=$location->timeZoneId;
        $rawOffset=$location->rawOffset/3600;
        $sunset = date_sunset(time(), SUNFUNCS_RET_STRING, $location->lat, $location->lng, 90, $rawOffset);
        $sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, $location->lat, $location->lng, 90, $rawOffset);
        }
        return view('dashboard', ['chart' => $chart,'rawOffset'=> $rawOffset,'timeZoneId'=> $timeZoneId, 'sunset' => $sunset,'sunrise'=>$sunrise]);
    }

    public function documentation()
    {
        $path = storage_path('app/public/documentation.pdf');
        return response()->file($path);
    }
}
