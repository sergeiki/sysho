<?php

declare(strict_types=1);

namespace App\ModelORM\ProductCategory\UseCase\Create;

class Command
{
    public $product_id;
    public $category_id;
    public $product_category_id;

    public function __construct($product_category_id, $product_id, $category_id)
    {
        $this->product_category_id = $product_category_id;
        $this->product_id = $product_id;
        $this->category_id = $category_id;
    }

}
