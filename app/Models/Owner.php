<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'owner_address',
        'owner_phone'
    ];

    public function assets(){
        return $this->hasMany(Asset::class, 'owner_id', 'id');
    }
}
