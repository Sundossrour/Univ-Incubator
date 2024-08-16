<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dayName',
        'eventDate',
        'eventTime',
        'details',
        'status',
        'created_by',
        'univCollegeID',
    ];

    public function LAdmin()
    {
        return $this->belongsTo(LAdmin::class, 'created_by');
    }
}
