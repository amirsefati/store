<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name','items','location','icon_url','link','desc','time_start','time_end','noorder'];
}
