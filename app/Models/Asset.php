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
        'owner_id',
        'description',
        'status',
        'attachment',
        'image'
    ];

    public function seller(){
        return $this->belongsTo(Seller::class,'seller_id','id');
    }

    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id','id');
    }
}
