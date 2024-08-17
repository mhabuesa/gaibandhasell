<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'] ;

    function store(){
        return $this->belongsTo(StoreModel::class,'store_id');
    }
    function brand(){
        return $this->belongsTo(BrandModel::class,'brand_id');
    }
    function category(){
        return $this->belongsTo(CategoryModel::class,'category_id');
    }
    function storeInfo(){
        return $this->belongsTo(StoreModel::class,'store_id');
    }
    public function inventories()
    {
        return $this->hasMany(InventoryModel::class, 'product_id');
    }

}
