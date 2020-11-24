<?php

declare(strict_types=1);

namespace App\ModelORM\Category\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity
 * @ORM\Table(name="category_category", uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"id"}),
 *     @ORM\UniqueConstraint(columns={"slug"})
 * })
 */
class Category
{
    /**
     * @var Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     *
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    public function __construct($id = null)
    {
        $id == null ? $this->id = uuid::uuid4() : $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setSlug($slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

}
