<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Wishlist extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'wishlist';

    protected $guarded = [
        'id'
    ];
}
