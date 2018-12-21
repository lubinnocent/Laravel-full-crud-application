<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'my_products';
    protected $primaryKey = 'product_id';
    public $timestamps=false;
    public $image=false;

}
