<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'] ;

    function vendor(){
        return $this->belongsTo(User::class,'seller_id');
    }

}
