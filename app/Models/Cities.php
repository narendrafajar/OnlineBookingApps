<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'province_id',
        'city_name',
    ];

    public function province()
    {
        $this->belongsTo(Provinces::class,'province_id');
    }
}
