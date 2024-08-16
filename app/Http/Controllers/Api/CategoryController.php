<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller {

    public function getCatalog() 
    {
        $catalog = Category::whereNull('parent_id')
        ->with(
            'products', 
            'children.products', 
            'children.children.products',
            'children.children.children.products',
            'children.children.children.children.products')
        ->get();

        return $catalog;
    }

    public function index() 
    {
        $categories = Category::get();
        if ($categories == null) {
            abort(404);
        }
        return $categories;
    }

    public function changeParentCategory(Category $child, Category $parent)
    {
        $child->changeParent($parent);
        return response()->setStatusCode(200);
    }
}

