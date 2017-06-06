<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
      'model','code','created_at','updated_at',
    ];
}
