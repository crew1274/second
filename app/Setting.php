<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    'model','address','ch','speed','circuit','token','created_at','updated_at',
  ];
}
