<?php

declare(strict_types=1);

namespace App\ModelORM\Category\UseCase\Update;

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
        $category = $this->repo->findOneBy(['id' => $command->id]);
        $category
                ->setName($command->name)
                ->setDescription($command->description)
                ->setSlug($command->slug)
        ;
    }
}
