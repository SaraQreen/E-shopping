<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAtrr extends Model
{
    protected $table='product_att';
    protected $primaryKey='id';
    protected $fillable=['products_id','sku','size','price','stock'];
}
