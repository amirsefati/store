<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','desc','img','price','cate','sub_cate','size','show','slide','off','per_price','quantity','instruction','relate','etc'];
}
