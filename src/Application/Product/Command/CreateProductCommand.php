<?php

namespace App\Application\Product\Command;

class CreateProductCommand
{
    public string $id;
    public string $name;
    public string $description;
    public float $basePrice;
    public int $stock;
    public array $variants;

    public function __construct(string $id, string $name, string $description, float $basePrice, int $stock, array $variants)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->basePrice = $basePrice;
        $this->stock = $stock;
        $this->variants = $variants;
    }

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

    public function getVariants(): array 
    {
        return $this->variants;
    }
}