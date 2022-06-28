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
        'departure_date',
        'arrival_date',
        'departure_time',
        'arrival_time',
        'departure_location',
        'destination_location',
        'number_busseat',
        'price',
        'company_id',
        'user_id',
    ];

}
