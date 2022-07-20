<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['description', 'idcategory', 'idunit', 'stock', 'price', 'status'];
    public function category(){
        return $this->hasOne(Category::class, 'id', 'idcategory');
    }
    public function unit(){
        return $this->hasOne(Unit::class, 'id', 'idunit');
    }
}
