<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnivEventImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'details',
        'UnivEventID',
    ];

    public function univEvent()
    {
        return $this->belongsTo(UnivEvent::class, 'UnivEventID');
    }
}
