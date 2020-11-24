<?php

declare(strict_types=1);

namespace App\ModelORM\Category\Entity;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;


class CategoryRepository
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
        $this->repo = $em->getRepository(Category::class);
    }

    public function add(Category $category): void
    {
        $this->em->persist($category);
    }

    public function findOneBy(array $criteria)
    {
        return $this->repo->findOneBy($criteria);
    }
}
