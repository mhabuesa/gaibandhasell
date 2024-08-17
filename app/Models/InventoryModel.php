<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'] ;

    function rel_to_color(){
        return $this->belongsTo(ColorModel::class, 'color_id');
    }
    function rel_to_size(){
        return $this->belongsTo(SizeModel::class, 'size_id');
    }


    // public function product()
    // {
    //     return $this->belongsTo(ProductModel::class, 'product_id');
    // }
}
