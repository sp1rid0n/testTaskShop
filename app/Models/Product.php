<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function changeCategory(Category $category) 
    {
        $product = Product::find($this->id);
        $product->category_id = $category->id;
        $product->save();
    }
}
