<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Category extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'categories';

    protected $guarded = [
        'id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }
}
