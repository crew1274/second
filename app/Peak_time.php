<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peak_time extends Model
{
    protected $fillable = [
      'start','end','state','day','created_at','updated_at',
    ];
}
