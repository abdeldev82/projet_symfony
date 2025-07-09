<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class LuckyController
{
    #[Route('/lucky/number1')]
    
    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }




     #[Route('/send-email')]

     public function sendEmail(MailerInterface $mailer): Response
{
    $email = (new Email())
        ->from('from@example.com')
        ->to('to@example.com')
        ->subject('Test Email Symfony')
        ->text('Voici un test d\'envoi de mail via SMTP !')
        ->html('<p>Voici un test d\'<strong>envoi de mail</strong> via SMTP !</p>');

    $mailer->send($email);

    return new Response('Email envoyé !');
}
}