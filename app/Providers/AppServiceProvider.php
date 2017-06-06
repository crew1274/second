<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Peak_time;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('include_check', function($attribute, $value, $parameters, $validator)
        {
            $data = $validator->getData();
            $end = $data[$parameters[0]];
            $day = $data[$parameters[1]];
            $peaks = Peak_time::all();
            foreach ($peaks as $peaks)
            {
            if ($day ==  $peaks -> day)
            {
            if( $value < $peaks->start   && $end > $peaks->end )
                {
                    return false;
                }
            }}
            return true;
        });

        Validator::extend('greater_check', function($attribute, $value, $parameters, $validator)
        {
            $data = $validator->getData();
            $min_value = $data[$parameters[0]];
            return $value > $min_value;
        });


        Validator::extend('time_conflict', function($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();
            $day = $data[$parameters[0]];
            $peaks = Peak_time::all();
            foreach ($peaks as $peaks)
            {
            if ($day ==  $peaks -> day)
            {
            if( $value == $peaks->start || $value == $peaks-> end )
                {
                return false;
                }
            elseif ($value > $peaks->start && $value < $peaks-> end)
                {
                return false;
                }
            }}
                return true;
        });

        Validator::extend('include_check_edit', function($attribute, $value, $parameters, $validator)
        {
            $data = $validator->getData();
            $end = $data[$parameters[0]];
            $day = $data[$parameters[2]];
            $peaks = Peak_time::all();
            foreach ($peaks as $peaks)
            {
            if($peaks-> id == $parameters[1] )
                {continue;}
                if($day  == $peaks -> day)
                {
            if( $value < $peaks->start   && $end > $peaks->end )
                {
                    return false;
                }
            }}
            return true;
        });

        Validator::extend('time_conflict_edit', function($attribute, $value, $parameters, $validator) {
            $peaks = Peak_time::all();
            $data = $validator->getData();
            $day = $data[$parameters[1]];
            foreach ($peaks as $peaks)
            {
            if( $peaks-> id = $parameters[0] )
                {
                continue;
                }
                if($day == $peaks -> day)
                {
            if( $value == $peaks->start || $value == $peaks-> end )
                {
                return false;
                }
            if ($value > $peaks->start && $value < $peaks-> end)
                {
                return false;
                }
            }}
                return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
