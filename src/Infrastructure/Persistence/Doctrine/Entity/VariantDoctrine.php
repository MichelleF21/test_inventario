<?php

namespace App\Infrastructure\Persistence\Doctrine\Entity;

use App\Infrastructure\Persistence\Doctrine\Entity\ProductDoctrine;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "variants")]
class VariantDoctrine
{
    #[ORM\Id]
    #[ORM\Column(type: "string")]
    private string $id;

    #[ORM\Column]
    private string $size;

    #[ORM\Column]
    private string $color;

    #[ORM\Column(type: "float")]
    private float $price;

    #[ORM\Column(type: "integer")]
    private int $stock;

    #[ORM\Column]
    private string $image;

    #[ORM\ManyToOne(targetEntity: ProductDoctrine::class, inversedBy: "variants")]
    #[ORM\JoinColumn(name: "product_id", referencedColumnName: "id", onDelete: "CASCADE")]

    // #[ORM\ManyToOne(targetEntity: ProductDoctrine::class, inversedBy: "variants")]
    // #[ORM\JoinColumn(name: "product_id", referencedColumnName: "id", nullable: false)]
    private ProductDoctrine $product;

    public function setProduct(ProductDoctrine $product): void
    {
        $this->product = $product;
    }

    public function getProduct(): ProductDoctrine
    {
        return $this->product;
    }

    //id
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    //size
        public function setsize(string $size): void
    {
        $this->size = $size;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    //color
        public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    //price
        public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    //stock
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    //image
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    
    public function getImage(): string
    {
        return$this->image;
    }

    
}

