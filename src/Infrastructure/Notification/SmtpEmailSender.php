<?php

namespace App\Infrastructure\Notification;

use App\Domain\Notification\EmailSenderInterface;

class SmtpEmailSender implements EmailSenderInterface
{
    public function send(string $to, string $subject, string $body): void
    {
        // Simulación de envío SMTP
        echo "Enviado por SMTP a $to: $subject - $body\n";
    }
}