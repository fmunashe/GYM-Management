<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable;

    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'mobile',
        'dob',
        'user_type',
        'joining_date',
        'terms_and_conditions',
        'club_id'
    ];

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
        'joining_date' => 'datetime',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function healthStatus()
    {
        return $this->hasMany(HealthStatus::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function timeTable()
    {
        return $this->hasMany(TimeTable::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function requisitions()
    {
        return $this->hasMany(Requisition::class);
    }


}
