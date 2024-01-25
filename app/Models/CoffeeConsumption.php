<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeConsumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'year_of_order',
        'month_of_order',
        'day_of_order',
    ];

    public function employee() {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    } 
}
