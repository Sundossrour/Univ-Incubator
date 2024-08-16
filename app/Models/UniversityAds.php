<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniversityAds extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'title',
        'body',
        'details',
        'img',
        'universityID',
        'created_by',
    ];

    public function LAdmin()
    {
        return $this->belongsTo(LAdmin::class, 'created_by');
    }

    //علاقة الجامعات مع الاعلانات

    public function university()
    {
        return $this->belongsTo(University::class, 'universityID');
    }

}
