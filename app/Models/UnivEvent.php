<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnivEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'universityID',
        'eventID',
    ];

    public function university()
    {
        return $this->belongsTo(University::class, 'universityID');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'eventID');
    }
}
