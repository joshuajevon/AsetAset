<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_name',
        'seller_address',
        'seller_phone'
    ];

    public function assets(){
        return $this->hasMany(Asset::class);
    }
}
