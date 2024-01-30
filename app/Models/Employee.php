<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'department_id',
        'telephone',
    ];

    public function department() {
        return $this->hasOne(Department::class, 'id', 'department_id');
    } 

    public function consumption() {
        return $this->hasMany(CoffeeConsumption::class, 'employee_id');
    }

    public function payment() {
        return $this->hasMany(Payment::class, 'employee_id');
    }

    public function getEmployeeFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
  
    public function getEmployeeFullNameReverseAttribute() {
      return $this->last_name . ' ' . $this->first_name;
    }  
}
