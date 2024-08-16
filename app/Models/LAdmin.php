<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class LAdmin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard ='ladmin';
    protected $fillable = [
        'name',
        'email',
        'age',
        'phone',
        'status',
        'gender',
        'img',
        'password',
        'created_by',
    ];

     //علاقة المسؤول المحلي مع المسؤولين العامين

     public function Gadmin()
     {
         return $this->belongsTo(GAdmin::class, 'created_by');
     }


      //علاقة المسؤول المحلي مع الجامعات

    public function university()
    {
        return $this->hasMany(LAdminUniversity::class,'ladminID');
    }

    //    //علاقة المسؤول المحلي مع الاعلانات

    //    public function ads()
    //    {
    //        return $this->hasMany(Ads::class,'created_by');
    //    }


        //علاقة المسؤول المحلي مع الكادر التدريسي

        public function teachingStaff()
        {
            return $this->hasMany(TeachingStaff::class,'created_by');
        }

        //علاقة المسؤول المحلي مع الفعاليات

       public function event()
       {
           return $this->hasMany(Event::class,'created_by');
       }


    //    //علاقة المسؤول المحلي مع الكليات

    //    public function college()
    //    {
    //        return $this->hasMany(College::class,'created_by');
    //    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
