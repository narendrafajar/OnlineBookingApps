<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    use HasFactory;
    protected $table = 'treatments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'image_treatments',
        'treatment_code',
        'treatment_name',
        'therapist_id',
        'treatment_price',
        'treatment_recomend',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function personTherapist()
    {
        return $this->belongsTo(Therapist::class,'therapist_id');
    }
}
