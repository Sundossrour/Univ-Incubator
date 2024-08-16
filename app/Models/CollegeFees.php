<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollegeFees extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'annualFees',
        'annualFeesNumber',
        'details',
        'annualFeesDate',
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
