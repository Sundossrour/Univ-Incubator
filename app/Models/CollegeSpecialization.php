<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollegeSpecialization extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'img',
        'created_by',
        'univCollegeID',
    ];

    public function univCollege()
    {
           return $this->belongsTo(UniversityCollege::class,'univCollegeID');
   }

   public function LAdmin()
   {
          return $this->belongsTo(LAdmin::class,'created_by');
  }
}
