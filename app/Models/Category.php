<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;
    
    protected $fillable = ['name', 'parent_id'];

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('children');
    }

    public function products() {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function changeParent(Category $parent) {
        $category = Category::find($this->id);
        if ($category->is($parent)) {
            $category->parent_id = null;
        } else {
            $category->parent_id = $parent->id;
        }
        $category->save();
    }
}
