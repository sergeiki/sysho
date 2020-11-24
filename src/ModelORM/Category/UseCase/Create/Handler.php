<?php

declare(strict_types=1);

namespace App\ModelORM\Category\UseCase\Create;

use App\ModelORM\Category\Entity\Category;
use App\ModelORM\Flusher;
use App\ModelORM\Category\Entity\CategoryRepository;

class Handler
{
    /**
     * @var Flusher
     */
    private $flusher;
    /**
     * @var CategoryRepository
     */
    private $repo;

    /**
     * Handler constructor.
     * @param CategoryRepository $repo
     * @param Flusher $flusher
     */
    public function __construct(CategoryRepository $repo, Flusher $flusher)
    {
        $this->repo = $repo;
        $this->flusher  = $flusher;
    }

    public function handle($command)
    {
        $category =
            (new Category($command->id))
            ->setName($command->name)
            ->setDescription($command->description)
            ->setSlug($command->slug)
        ;
        $this->repo->add($category);
    }
}
