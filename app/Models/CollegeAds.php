<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollegeAds extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'title',
        'body',
        'details',
        'img',
        'univCollegeID',
        'created_by',
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
