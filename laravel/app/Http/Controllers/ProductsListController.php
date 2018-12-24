<?php

namespace App\Http\Controllers;

use App\Features\Products\Fetch\GetAllProducts;
use App\Features\Products\Update\UpdateDisplayInShopAttribute;

class ProductsListController {

    public function index()
    {
        $products = (new GetAllProducts)->execute();

        return view('products_list', compact('products'));
    }

    public function update()
    {
        (new UpdateDisplayInShopAttribute)->execute();

        // Once we run Laravel as a standalone app,
        // we can use Laravel's redirect helpers, like so:
        // redirect('/products_list.php');
        // but for now we have to redirect back to the /products_list.php file
        // to bootstrap Laravel
        header('Location: /products_list.php');
        exit(0);
    }
}
