<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TimeTable extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'monday_routine',
        'tuesday_routine',
        'wednesday_routine',
        'thursday_routine',
        'friday_routine',
        'saturday_routine',
        'sunday_routine',
        'trainer_id',
    ];

    public function trainer()
    {
        return $this->belongsTo(User::class);
    }

}
