<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Plan extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'plan_name',
        'description',
        'validity_period',
        'amount',
        'active',
        'club_id'
    ];


    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }

}
