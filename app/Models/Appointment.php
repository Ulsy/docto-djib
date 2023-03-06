<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'motif',
        'patient_record',
        'id_doctor',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
