<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','description','price','gender','pictureURL', 'amount'];
    public function product_order(){
        return $this->hasMany("App\Models\Product_Cart");
    }
    public function orders(){
        return $this->belongsToMany('Orders');
    }
}
