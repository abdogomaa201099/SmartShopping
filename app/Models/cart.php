<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
{
    return $this->hasOne(\App\Models\Product::class, 'id','product_id');
}
public function order()
{
    return $this->hasOne(\App\Models\order::class, 'id','order_id');
}
public function user()
{
    return $this->hasOne(\App\Models\user::class);
}

}