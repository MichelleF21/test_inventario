<?php

// namespace App\Domain\Product\Entity;

// use Doctrine\ORM\Mapping as ORM;

// class Variant
// {
//     private string $id;
//     private string $size;
//     private string $color;
//     private float $price;
//     private int $stock;
//     private string $image;

//     public function __construct(string $id, string $size, string $color, float $price, int $stock, string $image)
//     {
//         if($price <=0) throw new \InvalidArgumentException("El precio base es inválido, por favor indique un precio real");
//         if($stock < 0) throw new \InvalidArgumentException("Indique una cantidad mayor a cero");

//     $this->id = $id;
//     $this->size = $size;
//     $this->color = $color;
//     $this->price = $price;
//     $this->stock = $stock;
//     $this->image = $image;

//     }

//     //getters
//     public function getId(): string
//     {
//         return $this->id;
//     }

//     public function getSize(): string
//     {
//         return $this->size;
//     }

//     public function getColor(): string
//     {
//         return $this->color;
//     }

//     public function getPrice(): float
//     {
//         return $this->price;
//     }

//     public function getStock(): int
//     {
//         return $this->stock;
//     }

//     public function getImage(): string
//     {
//         return $this->image;
//     }
// }

namespace App\Domain\Product\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "variants")]
class Variant
{
    #[ORM\Id]
    #[ORM\Column(type: 'string')]
    private string $id;

    #[ORM\Column(type: 'string')]
    private string $size;

    #[ORM\Column(type: 'string')]
    private string $color;

    #[ORM\Column(type: 'float')]
    private float $price;

    #[ORM\Column(type: 'integer')]
    private int $stock;

    #[ORM\Column(type: 'string')]
    private string $image;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'variants')]
    #[ORM\JoinColumn(nullable: false)]
    private Product $product;

    public function __construct(string $id, string $size, string $color, float $price, int $stock, string $image)
    {
            if($price <=0) throw new \InvalidArgumentException("El precio base es inválido, por favor indique un precio real");
            if($stock < 0) throw new \InvalidArgumentException("Indique una cantidad mayor a cero");

        $this->id = $id;
        $this->size = $size;
        $this->color = $color;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    // Puedes agregar un getter si es necesario
    public function getProduct(): Product
    {
        return $this->product;
    }

    //getters
    public function getId(): string
    {
        return $this->id;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    
}