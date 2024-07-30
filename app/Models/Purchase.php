<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {
    use HasFactory;
    
    protected $fillable = ['product_id', 'price', 'purchase_date'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function purchasesLastMonth() {
        return self::where('purchase_date', '>=', now()->subMonth())->with('product')->get();
    }
}
