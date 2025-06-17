<?php

namespace App\Domain\Product\Repository;

use App\Domain\Product\Entity\Product;

//se crearia el puerto de salida o interfaz del repositorio
interface ProductRepositoryInterface
{
    public function save(Product $product): void;

    public function find(string $id): ?Product;

    public function findAll(): array;
}