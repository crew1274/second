<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

use App\Demand_setting;
use App\Location;


class ApiController extends Controller
{
    public function demand()
    {
        $last=Demand_setting::all() ->last();
        return response()->json($last->toJson());
    }

    public function geocoding()
    {
        $location = Location::all() -> last();
       /*if($location==null)
        {return null;}*/
        $client = new Client();
        /*透過google api取得經緯度*/      
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?address=台南市&key='.env('GOOGLE_API_KEY'), ['verify' => false]);
        $response = json_decode($response->getBody(), true);
        if($response['status'] != 'OK')
        {
            return redirect()->action('LocationController@index') ->with('errors','無法確認地址的正確位置');
        }
        //取得經緯度
        $lat = $response["results"][0]['geometry']["location"]['lat'];
        $lng = $response["results"][0]['geometry']["location"]['lng'];
        //取得時區

        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/timezone/json?location='.$lat.','.$lng.
        '&timestamp='.time().'&key='.env('GOOGLE_API_KEY'), ['verify' => false]);
        $response = json_decode($response->getBody(), true);
        return $response;
    }

    public function suntime()
    {
        $location = Location::all() -> last();
        if($location==null)
        {return null;}
        $lat=$location->lat;//緯度
        $lng=$location->lng;//經度
        $timeZoneId=$location->timeZoneId;//時區
        $rawOffset=$location->rawOffset/3600;//時差
        $sunset = date_sunset(time(), SUNFUNCS_RET_STRING, $location->lat, $location->lng, 90, $rawOffset);//日出時間
        $sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, $location->lat, $location->lng, 90, $rawOffset);//日落時間
        return ['lat'=>$lat,'lng'=>$lng,'timeZoneId'=> $timeZoneId,'rawOffset'=> $rawOffset, 'sunset' => $sunset,'sunrise'=>$sunrise];
    }
}
