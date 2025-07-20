<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'quantity',
        'category_id',
        'brand_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }
}
