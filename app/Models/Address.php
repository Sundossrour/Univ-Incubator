<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'city',
        'region',
        'street',
        'near',
        'another_details',
        'longitude',
        'latitude',
        'created_by',
    ];

     //علاقة المكان مع الجامعات

     public function university()
     {
         return $this->hasMany(University::class,'address_id');
     }
    
}
