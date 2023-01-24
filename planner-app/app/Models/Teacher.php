<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected  $table='teachers';
    public  function students(){
        return $this->hasMany(Student::class);
    }
    public  function sources(){
        return $this->hasMany(Source::class);
    }
    public  function meetings(){
        return $this->hasMany(Meeting::class);
    }
}
