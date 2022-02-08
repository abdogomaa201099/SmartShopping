<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $guarded = [];




    public function carts()
{
    return $this->hasMany(\App\Models\cart::class);
}

public function user()
{
    return $this->hasOne(\App\Models\user::class);
}

}

