<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Address extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'street_name',
        'city',
        'state',
        'zip',
        'user_id',
        'club_id'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class,'address','user_id');
    }
}
