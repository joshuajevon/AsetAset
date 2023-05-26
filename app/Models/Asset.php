<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'province',
        'city',
        'price',
        'seller_id',
        'description',
        'attachment',
        'image'
    ];

    public function seller(){
        return $this->belongsTo(Seller::class, 'id');
    }
}
