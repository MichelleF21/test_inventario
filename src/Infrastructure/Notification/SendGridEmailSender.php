<?php

namespace App\Infrastructure\Notification;

use App\Domain\Notification\EmailSenderInterface;

class SendGridEmailSender implements EmailSenderInterface
{
    public function send(string $to, string $subject, string $body): void
    {
        // Simulación de envío SendGrid
        echo "Enviado por SendGrid a $to: $subject - $body\n";
    }
}

//aqui se podria agregar otro proveedor siguiendo la misma logica y no habria problema de tener que modificar algo mas