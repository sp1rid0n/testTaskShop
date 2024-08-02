<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller {

    public function show($id) {
        $product = Product::with('category')->find($id);
        if ($product == null) {
            throw new \Exception('Product not found');
        }

        return $product;
    }

    public function moveToCategory(int $productId, int $categoryId) {
        try {
            $product = Product::find($productId);
            $product->category_id = $categoryId;
            $product->save();

            return response()->setStatusCode(200);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function sortProducts(Request $request) {
        try {
            $field = $request->field; 
            $direction = $request->direction;
            $categoryId = $request->categoryId;
            $products = Product::where('category_id', $categoryId)->orderBy($field, $direction)->get();
            return $products;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
