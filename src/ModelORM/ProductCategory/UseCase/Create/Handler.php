<?php

declare(strict_types=1);

namespace App\ModelORM\ProductCategory\UseCase\Create;

use App\ModelORM\Flusher;
use App\ModelORM\ProductCategory\Entity\ProductCategory;
use App\ModelORM\ProductCategory\Entity\ProductCategoryRepository;

class Handler
{
    /**
     * @var ProductCategoryRepository
     */
    private $repo;

    /**
     * Handler constructor.
     * @param ProductCategoryRepository $repo
     */
    public function __construct(ProductCategoryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function handle($command)
    {
        $product_category =
            (new ProductCategory($command->product_category_id))
            ->setProductId($command->product_id)
            ->setCategoryId($command->category_id)
        ;
        $this->repo->add($product_category);
    }
}
