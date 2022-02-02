<?php

namespace App\Services;

use App\Contracts\ProductServiceInterface;
use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    public function getProductGetById($id){
        return Product::findOrFail($id);
    }
}
