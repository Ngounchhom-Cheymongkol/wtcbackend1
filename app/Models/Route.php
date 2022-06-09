<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $table='routes';
    protected $primarykey='id';
    protected $fillable = [
        'departure_datetime',
        'arrival_datetime',
        'departure_location',
        'destination_location',
        'rnumber_busseatole_id',
        'company_id'
    ];

}
