<?php

declare(strict_types=1);

namespace App\ModelORM\Product\UseCase\Create;

use App\ModelORM\Flusher;
use App\ModelORM\Product\Entity\Product;
use App\ModelORM\Product\Entity\ProductRepository;

class Handler
{
    /**
     * @var ProductRepository
     */
    private $repo;
    /**
     * @var Flusher
     */
    private $flusher;

    /**
     * Handler constructor.
     * @param ProductRepository $repo
     * @param Flusher $flusher
     */
    public function __construct(ProductRepository $repo, Flusher $flusher)
    {
        $this->repo = $repo;
        $this->flusher  = $flusher;
    }

    public function handle($command)
    {
        $product = (new Product($command->id))
            ->setActive($command->active)
            ->setName($command->name)
            ->setPrice($command->price)
            ->setShortDescription($command->short_description)
            ->setLongDescription($command->long_description)
            ->setVendorCode($command->vendor_code)
        ;
        $this->repo->add($product);
    }
}

