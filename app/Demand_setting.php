<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand_setting extends Model
{
    protected $fillable = [
      'value','value_max','value_min','load_off_gap','reload_delay','reload_gap','mode','group','cycle','created_at','updated_at',
    ];
}
