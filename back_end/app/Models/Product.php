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
        'short_description', 
        'description', 
        'regular_price', 
        'stock_status', 
        'featured', 
        'images', 
        'imagess',
        'category_id', 
        'categorie_product',
        'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class,'brand_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function images()
{
    return $this->hasMany(ProductImage::class);
}
}
