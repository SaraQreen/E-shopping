<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=['categories_id','p_name','p_code','p_color','description','price','image'];

    public function category(){
        return $this->belongsTo(Category::class,'categories_id','id');
    }
    public function attributes(){
        return $this->hasMany(ProductAtrr::class,'products_id','id');
    }
}
