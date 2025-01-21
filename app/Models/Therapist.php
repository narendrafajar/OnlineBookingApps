<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;
    protected $table = 'therapist';
    protected $primaryKey = 'id';
    protected $fillable = [
        'therapist_code',
        'therapist_name',
        'therapist_pic',
    ];

    // public function treatments()
    // {

    // }
}
