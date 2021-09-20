<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Image extends Model
{
    use HasFactory, HasUserStamps, SoftDeletes;

    protected $table = 'images';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
