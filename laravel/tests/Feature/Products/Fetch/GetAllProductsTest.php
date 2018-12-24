<?php

namespace Tests\Feature\Products\Fetch;

use Tests\TestCase;
use App\Features\Products\Fetch\GetAllProducts;

class GetAllProductsTest extends TestCase
{
    public function testGetAllProductsTest()
    {
        $products = (new GetAllProducts)->execute();

        $this->assertSame(3, count($products));
        $this->assertSame('Product A', $products[0]->name);
        $this->assertSame('Product B', $products[1]->name);
        $this->assertSame('Product C', $products[2]->name);
    }
}
