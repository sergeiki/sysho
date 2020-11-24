<?php

declare(strict_types=1);

namespace App\ModelORM\Product\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_product", uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"id"}),
 *     @ORM\UniqueConstraint(columns={"vendor_code"})
 * })
 */
class Product
{
    /**
     * @var Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */

    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $short_description;

    /**
     * @ORM\Column(type="text")
     */
    private $long_description;

    /**
     * @ORM\Column(type="integer")
     */
    private $vendor_code;

    public function __construct($id = null)
    {
        $id == null ? $this->id = uuid::uuid4() : $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->long_description;
    }

    public function setLongDescription(string $long_description): self
    {
        $this->long_description = $long_description;

        return $this;
    }

    public function getVendorCode(): ?int
    {
        return $this->vendor_code;
    }

    public function setVendorCode(int $vendor_code): self
    {
        $this->vendor_code = $vendor_code;

        return $this;
    }
}
