<?php

declare(strict_types=1);

namespace App\ModelORM\Category\UseCase\Create;

class Command
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $slug;

    public $id;

    public function __construct($id, string $name, string $description, string $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->slug = $slug;
    }
}
