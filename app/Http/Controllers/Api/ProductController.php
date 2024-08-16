<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller {

    public function show($id) {
        $product = Product::with('category')->find($id);
        if ($product == null) {
            abort(404);
        }
        return $product;
    }

    public function moveToCategory(Product $product, Category $category) {
        $product->changeCategory($category);
        return response()->setStatusCode(200);
    }

    public function sortProducts(Request $request) {
        $field = $request->field; 
        $direction = $request->direction;
        $category = $request->category;
        $products = Product::where('category_id', $category)->orderBy($field, $direction)->get();
        return $products;
    }
}
  