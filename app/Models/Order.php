<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Order extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'orders';

    protected $guarded = [
        'id'
    ];

    protected $with = ['orderProducts', 'user'];

    public function orderProducts()
    {
        return $this->hasMany(OrderProducts::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
