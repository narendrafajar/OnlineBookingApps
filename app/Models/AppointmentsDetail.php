<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentsDetail extends Model
{
    use HasFactory;
    protected $table = 'appointments_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'app_id',
        'treatment_id',
        'therapist_id',
    ];
}
