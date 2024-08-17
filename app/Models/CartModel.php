<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'] ;

    public function rel_to_product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
    public function rel_to_color()
    {
        return $this->belongsTo(ColorModel::class, 'color_id');
    }
    public function rel_to_size()
    {
        return $this->belongsTo(SizeModel::class, 'size_id');
    }
    public function rel_to_store()
    {
        return $this->belongsTo(StoreModel::class, 'store_id');
    }
}
