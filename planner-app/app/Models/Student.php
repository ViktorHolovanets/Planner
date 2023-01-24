<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded=[];
    public  function meetings(){
        return $this->hasMany(Meeting::class);
    }
    public  function sources()
    {
        return $this->belongsToMany(Source::class,'source_student');
    }
    public  function group()
    {
        return $this->belongsTo(Group::class);
    }
}
