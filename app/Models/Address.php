<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Address extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'addresses';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
