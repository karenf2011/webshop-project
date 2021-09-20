<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Product extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'products';

    protected $with = ['brand', 'categories', 'time_period', 'images'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function time_period()
    {
        return $this->belongsTo(TimePeriod::class, 'time_period_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
}
