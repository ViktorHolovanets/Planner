<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Meeting extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'meetings';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    static public function getCasheMeetingsToday()
    {
        $value = Cache::remember('users', 1800, function () {
            return self::query()->with('student')
                ->where('user_id',Auth::id())
                ->whereDay('time_work', date('d'))
                ->whereMonth('time_work', date('m'))
                ->get();
        });
        return $value;
    }
}
