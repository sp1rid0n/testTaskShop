<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller {

    public function getCatalog() {
        try {
            $catalog = Category::whereNull('parent_id')
            ->with(
                'products', 
                'children.products', 
                'children.children.products',
                'children.children.children.products',
                'children.children.children.children.products')
            ->get();

            return $catalog;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function index() {
        $categories = Category::get();
        if ($categories == null) {
            throw new \Exception('Product not found');
        }
        return $categories;
    }

    public function changeParentCategory(int $categoryId, int $parentId) {
        try {
            $category = Category::find($categoryId);
            if ($parentId === $categoryId) {
                $category->parent_id = null;
            } else {
                $category->parent_id = $parentId;
            }
            $category->save();

            return response()->setStatusCode(200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

