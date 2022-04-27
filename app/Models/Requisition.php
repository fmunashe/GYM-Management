<?php

namespace App\Models;

use App\Http\Traits\UUIDs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    use UUIDs;

    protected $fillable = [
        'user_id',
        'club_id',
        'status',
        'request_date',
        'decision_date',
        'approver_id',
        'comments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id', 'id');
    }
}
