<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Purchase extends Model {
    use HasFactory;
    
    protected $fillable = ['product_id', 'price', 'purchase_date'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function ScopePurchasesLastMonth(Builder $query) {
        return $query->where('purchase_date', '>=', now()->subMonth())->with('product');
    }
}
