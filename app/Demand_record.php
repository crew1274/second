<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand_record extends Model
{
    protected $fillable = [
      'value','circuit','created_at','updated_at',
    ];
}
