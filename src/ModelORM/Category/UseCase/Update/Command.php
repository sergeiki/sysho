<?php

declare(strict_types=1);

namespace App\ModelORM\Category\UseCase\Update;

class Command
{
    public $id;
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

    /**
     * Command constructor.
     * @param $id
     * @param string $name
     * @param string $description
     * @param string $slug
     */
    public function __construct($id, string $name, string $description, string $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->slug = $slug;
    }
}