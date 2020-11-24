<?php

declare(strict_types=1);

namespace App\ModelORM\ProductCategory\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="product_category_product_category",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(columns={"id"})
 *     },
 *     indexes={
 *         @ORM\Index(columns={"product_id", "category_id"})
 *     }
 * )
 */
class ProductCategory
{
    /**
     * @var Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    private $id;
    /**
     * @var Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid")
     */
    private $product_id;
    /**
     * @var Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid")
     */
    private $category_id;

    public function __construct($id = null)
    {
        $id === null ? $this->id = uuid::uuid4() : $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setProductId($product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function setCategoryId($category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }
}