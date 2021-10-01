<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes, Searchable;

    protected $table = 'products';

    protected $guarded = [
        'id'
    ];

    protected $with = ['brand', 'categories', 'time_period', 'images'];
    
    public function searchableAs()
    {
        return 'posts_index';
    }
    
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

    public function orderProducts()
    {
        return $this->hasMany(OrderProducts::class, 'product_id');
    }

    public static function getTotal($session)
    {
        $total = 0;
        foreach ($session as $product_id => $quantity) {
            $product = Product::findOrFail($product_id);
            $price = (double)$product->price;
            $totalPrice = $price * $quantity;
            $total += $totalPrice;
        }
        return $total;
    }


}
