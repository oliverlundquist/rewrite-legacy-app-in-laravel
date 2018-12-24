<?php

namespace Tests\Feature\Products\Update;

use Tests\TestCase;
use App\Features\Products\Update\UpdateDisplayInShopAttribute;
use App\Models\Products;

class UpdateDisplayInShopAttributeTest extends TestCase
{
    public function testUpdateDisplayAttributeSuccess()
    {
        $request = app('request');
        $request->replace([
            'product_id'      => 1,
            'display_in_shop' => 'yes'
        ]);
        (new UpdateDisplayInShopAttribute)->execute();

        $this->assertSame(1, Products::find(1)->display_in_shop);
    }

    public function testUpdateFailWithInvalidId()
    {
        // assert exception
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $request = app('request');
        $request->replace([
            'product_id'      => 9999,
            'display_in_shop' => 'yes'
        ]);
        (new UpdateDisplayInShopAttribute)->execute();
    }

    public function testUpdateFailWithInvalidDisplayInShop()
    {
        // assert exception
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $request = app('request');
        $request->replace([
            'product_id'      => 1,
            'display_in_shop' => 'invalid-value'
        ]);
        (new UpdateDisplayInShopAttribute)->execute();
    }
}
