<?php

declare(strict_types=1);

namespace App\ModelORM\Product\UseCase\Create;

use Symfony\Component\Validator\Constraints as Assert;

class Command
{
    /**
     * @var bool
     */
    public $active;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @var float
     * @Assert\NotBlank()
     */
    public $price;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    public $short_description;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    public $long_description;

    /**
     * @var integer
     * @Assert\NotBlank()
     */
    public $vendor_code;
    /**
     * @var object
     * @Assert\NotBlank()
     */
    public $id;

    /**
     * Command constructor.
     * @param $id
     * @param bool $active
     * @param string $name
     * @param float $price
     * @param string $short_description
     * @param string $long_description
     * @param int $vendor_code
     */
    public function __construct($id, bool $active, string $name, float $price, string $short_description, string $long_description, int $vendor_code)
    {
        $this->id = $id;
        $this->active = $active;
        $this->name = $name;
        $this->price = $price;
        $this->short_description = $short_description;
        $this->long_description = $long_description;
        $this->vendor_code = $vendor_code;
    }
}
