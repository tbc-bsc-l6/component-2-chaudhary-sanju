<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** 
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author that owns the product.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class); // Product has many orders
    }
}
