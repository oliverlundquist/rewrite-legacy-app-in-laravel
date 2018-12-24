<?php

namespace App\Features\Products\Fetch;

use App\Models\Products;

class GetAllProducts
{
    public function execute()
    {
        return Products::all();
    }
}
