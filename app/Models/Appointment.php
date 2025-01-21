<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'app_code',
        'users_id',
        'appointment_date',
        'appointment_time',
    ];


    public function manyTreatments()
    {
       return $this->hasMany(Treatments::class,'category_id');
    }

    public function users()
    {
        return $this->belongsTo(Users::class,'users_id');
    }
}
