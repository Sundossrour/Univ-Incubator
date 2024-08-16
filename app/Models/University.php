<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'status',
        'img',
        'type',
        'address_id',
        'catigory_id',
        'created_by'
    ];


    //علاقة الجامعة مع المسؤولين العامين

    public function Gadmin()
    {
        return $this->belongsTo(GAdmin::class, 'created_by');
    }

    //علاقة الجامعة مع الموقع

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }


    public function event()
    {
        return $this->hasMany(UnivEvent::class, 'universityID');
    }


    //علاقة الجامعات مع المسؤول المحلي  

    public function university()
    {
        return $this->hasMany(LAdminUniversity::class, 'universityId');
    }

    //علاقة الجامعات مع الكليات

    public function college()
    {
        return $this->hasMany(UniversityCollege::class, 'universityId');
    }

}
