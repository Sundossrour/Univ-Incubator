<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory ;

    protected $fillable = [
        'name',
        'dayName',
        'eventDate',
        'eventTime',
        'details',
        'status',
        'univercityCollegeID',
        'created_by'
    ];


    //علاقة الفعالية المسؤول المحلي   

    public function ladmin()
    {
        return $this->belongsTo(LAdmin::class, 'created_by');
    }

    //علاقة الفعاليات مع كليات الجامعة 

    public function univCollege()
    {
        return $this->belongsTo(UniversityCollege::class, 'univercityCollegeID');
    }

    public function university()
    {
        return $this->hasMany(UnivEvent::class, 'eventID');
    }
}
