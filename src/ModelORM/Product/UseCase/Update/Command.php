<?php

declare(strict_types=1);

namespace App\ModelORM\Product\UseCase\Update;

class Command
{
    /**
     * @var bool
     */
    public $active;
    
    /**
     * @var float
     */
    public $price;
    /**
     * @var string
     */
    public $short_description;
    /**
     * @var string
     */
    public $long_description;
    public $id;
    /**
     * @var string
     */
    public $name;

    /**
     * Command constructor.
     * @param string $id
     * @param bool $active
     * @param string $name
     * @param float $price
     * @param string $short_description
     * @param string $long_description
     */
    public function __construct($id, bool $active, string $name, float $price, string $short_description, string $long_description)
    {
        $this->id = $id;
        $this->active = $active;
        $this->name = $name;
        $this->price = $price;
        $this->short_description = $short_description;
        $this->long_description = $long_description;
    }
}