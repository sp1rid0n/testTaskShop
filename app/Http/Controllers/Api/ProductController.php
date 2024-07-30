<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function show($id)
    {
        $product = Product::with('category')->find($id);
        if (!$product) {
            return response()->json([
                "status" => false,
                "message" => "Product not found"
            ])->setStatusCode(404);
        }

        return $product;
    }

    public function moveToCategory(Request $request, int $productId, int $categoryId) {
        try {
            if (!$productId || !$categoryId) {
                return response()->json([
                    "status" => false,
                    "message" => "Failed query!"
                ])->setStatusCode(500);
            }

            $product = Product::find($productId);
            $product->category_id = $categoryId;
            $product->save();

            return response()->json([
                "status" => true,
                "message" => "Категория успешно изменена"
            ])->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e
            ])->setStatusCode(500);
        }
    }
}
