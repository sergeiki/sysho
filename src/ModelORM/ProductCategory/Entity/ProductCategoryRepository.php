<?php

declare(strict_types=1);

namespace App\ModelORM\ProductCategory\Entity;

use App\Helper\Persisted;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class ProductCategoryRepository
{
    /**
     * @var EntityRepository
     */
    private $repo;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository(ProductCategory::class);
    }

    public function add(ProductCategory $product_category): void
    {
        $this->em->persist($product_category);
    }
}
