<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table='my_products';
    protected $primaryKey = 'product_id';
    
    public $timestamps = false;
    
    protected $name = 'name';
    protected $price = 'price';
    protected $fillable = ['name','price'];
}
