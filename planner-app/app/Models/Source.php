<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='sources';
    public  function students()
    {
        return $this->belongsToMany(Student::class,'source_student');
    }
}
