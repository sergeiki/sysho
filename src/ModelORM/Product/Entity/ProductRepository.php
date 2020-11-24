<?php

declare(strict_types=1);

namespace App\ModelORM\Product\Entity;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class ProductRepository
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
        $this->repo = $em->getRepository(Product::class);
    }

    public function add(Product $product): void
    {
        $this->em->persist($product);
    }

    public function findOneBy(array $criteria)
    {
        return $this->repo->findOneBy($criteria);
    }
}
