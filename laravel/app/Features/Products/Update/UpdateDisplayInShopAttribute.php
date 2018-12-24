<?php

namespace App\Features\Products\Update;

use Illuminate\Http\Request;
use App\Models\Products;

class UpdateDisplayInShopAttribute
{
    public function execute()
    {
        $request       = app('request');
        $input         = $request->input();
        $validatedData = $request->validate([
            'product_id'      => 'required|exists:products,id',
            'display_in_shop' => 'required|in:yes,no'
        ]);
        $product_id      = $validatedData['product_id'];
        $display_in_shop = $validatedData['display_in_shop'] === 'yes' ? 1 : 0;

        // update database
        $product = Products::find($product_id);
        $product->display_in_shop = $display_in_shop;
        $product->save();
    }
}
