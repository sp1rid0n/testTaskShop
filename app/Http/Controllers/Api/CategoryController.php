<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller {
    public function getCatalog() {
        try {
            $catalog = Category::whereNull('parent_id')
            ->with('children', 'children.children', 'products', 'children.children.products')
            ->get();

            return $catalog;
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e
            ])->setStatusCode(500);
        }
    }

    public function index() {
        try {
            $categories = Category::get();

            return $categories;
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e
            ])->setStatusCode(500);
        }
    }
}

