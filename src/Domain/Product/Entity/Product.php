<?php

namespace App\Domain\Product\Entity;

use App\Domain\Product\Entity\Variant;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

class Product
{
    private string $id;
    private string $name;
    private string $description;
    private float $basePrice;
    private int $stock;
    private Collection $variants;
    // private array $variants;

    public function __construct(string $id, string $name, string $description, float $basePrice, int $stock)
    {
        if(empty($name)) throw new \InvalidArgumentException("No ha indicado el nombre");
        if($stock < 0) throw new \InvalidArgumentException("Indique una cantidad mayor a cero");
        if($basePrice <= 0) throw new \InvalidArgumentException("El precio base es inválido, por favor indique un precio real");

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->basePrice = $basePrice;
        $this->stock = $stock;
        $this->variants = new ArrayCollection();
        // $this->variants = [];
    }

    public function addVariant(Variant $variants): void
    {
        $variants->setProduct($this);
        $this->variants->add($variants);
        // $this->variant[] = $variant;
    }

    public function getVariants(): Collection
    {
        return $this->variants;
    }
    // public function getVariants(): array
    // {
    //     return $this->variants;
    // }

    //getters
    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getbasePrice(): float
    {
        return $this->basePrice;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

}