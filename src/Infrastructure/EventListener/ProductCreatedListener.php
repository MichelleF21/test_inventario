<?php

namespace App\Infrastructure\EventListener;

use App\Domain\Product\Event\ProductCreatedEvent;
use App\Domain\Notification\EmailSenderInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(event: ProductCreatedEvent::class)]
class ProductCreatedListener
{
    public function __construct(private EmailSenderInterface $emailSender) {}

    public function __invoke(ProductCreatedEvent $event): void
    {
        $this->emailSender->send(
            'pepe@up-spain.com',
            'Nuevo producto creado: ' . $event->name,
            "Se ha creado el nuevo producto con ID {$event->productId}, nombre {$event->name}, description {$event->description}, precio {$event->basePrice}, stock {$event->stock}."
        );
    }
}