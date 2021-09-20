<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class TimePeriod extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'time_periods';

    public function products()
    {
        return $this->hasMany(TimePeriod::class, 'time_period_id');
    }
}
