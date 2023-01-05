<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'pic_name', 'adress', 'postal_code', 'city', 'country', 'number','updated_at'];

}
