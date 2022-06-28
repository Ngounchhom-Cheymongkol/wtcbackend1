<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table='provinces';
    protected $primarykey='id';
    protected $fillable = [
        'province_name',
        'description',
        'nick_name'
    ];
}
