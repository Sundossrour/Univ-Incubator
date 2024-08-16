<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'details',
        'answer',
        'answerBy',
        'userID',
    ];

    public function LAdmin()
    {
        return $this->belongsTo(LAdmin::class, 'answerBy');
    }

    public function user()
    {
        return $this->belongsTo(UserS::class, 'userID');
    }
}
