<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniversityCollege extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'collegeName',
        'collegeImage',
        'created_by',
        'universityId',
    ];


    public function university()
    {
        return $this->belongsTo(University::class, 'universityId');
    }


    public function LAdmin()
    {
        return $this->belongsTo(LAdmin::class, 'created_by');
    }

}
