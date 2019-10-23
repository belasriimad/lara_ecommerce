<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $fillable = ['vendu','titre','description','qte','prix','image','vendu','category_id'];
}
