<?php

namespace App\Domain\Product\Event;

use Symfony\Contracts\EventDispatcher\Event;

//se esta creando el evento del dominio
class ProductCreatedEvent extends Event
{
    public function __construct(
        public readonly string $productId,
        public readonly string $name,
        public readonly string $description,
        public readonly float $basePrice,
        public readonly int $stock
    ) {}
}