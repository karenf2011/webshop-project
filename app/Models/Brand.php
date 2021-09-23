<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Brand extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'brands';

    protected $guarded = [
        'id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}
