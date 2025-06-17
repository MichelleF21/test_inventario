<?php

namespace App\Domain\Notification;

//crearemos una interfaz de servicio para el envio de correos
interface EmailSenderInterface
{
    public function send(string $to, string $subject, string $body): void;
}