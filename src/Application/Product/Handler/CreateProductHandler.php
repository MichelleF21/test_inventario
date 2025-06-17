<?php

namespace App\Application\Product\Handler;

use App\Domain\Product\Event\ProductCreatedEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Application\Product\Command\CreateProductCommand;
use App\Domain\Product\Entity\Product;
use App\Domain\Product\Entity\Variant;

//se tiene que registrar el handler  como servicio
class CreateProductHandler
{
    //esto aqui se modifico para que así se pueda lanzar el evento (eventDispatcherInterface)
    public function __construct(private ProductRepositoryInterface $repository, private EventDispatcherInterface $dispatcher) {}

    //aqui el __invoke seria como si el handler implementara una firma generica
    public function __invoke(CreateProductCommand $command): void
    {
        $product = new Product(
            $command->id,
            $command->name,
            $command->description,
            $command->basePrice,
            $command->stock
        );

        foreach ($command->variants as $variantData) {
            $variant = new Variant(
                $variantData['id'],
                $variantData['size'],
                $variantData['color'],
                $variantData['price'],
                $variantData['stock'],
                $variantData['image']
            );

            $product->addVariant($variant);
        }

        $this->repository->save($product);

        // Disparar evento de dominio
        $this->dispatcher->dispatch(
            new ProductCreatedEvent(
                $product->getId(),
                $product->getName(),
                $product->getDescription(),
                $product->getbasePrice(),
                $product->getStock()
            )
        );
    }
}

