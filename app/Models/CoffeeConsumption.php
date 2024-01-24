<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeConsumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date_of_order',
    ];
}
