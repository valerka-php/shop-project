<?php

namespace Framework\helpers;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class Mailer
{
    private static string $dsn;
    private static string $sendFrom;
    private static string $subject;
    private static string $txt;

    private static function setConfig(): void
    {
        $config = require '../app/config/mailConf.php';
        self::$dsn = "smtp://{$config['user']}:{$config['pass']}@{$config['smtp']}";
        self::$sendFrom = "{$config['user']}@gmail.com";
        self::$subject = "{$config['subject']}";
    }

    private static function createText(string $name, string $vkey): void
    {
        $body = require '../app/config/mailText.php';
        self::$txt = '<h1 style="text-align: center;color: chocolate"> Dear ' . $name . ' ' . $body . $vkey . '</h1>';
    }

    public static function confirmationEmail(string $email, string $name, string $vkey): void
    {
        self::setConfig();
        self::createText($name, $vkey);
        $transport = Transport::fromDsn(self::$dsn);
        $mailer = new \Symfony\Component\Mailer\Mailer($transport);

        $email = (new Email())
            ->from(self::$sendFrom)
            ->to("$email")
            ->subject(self::$subject)
            ->html(self::$txt);

        $mailer->send($email);
    }


    public static function sendInvoice(string $email, string $txt): bool
    {
        self::setConfig();
        $transport = Transport::fromDsn(self::$dsn);
        $mailer = new \Symfony\Component\Mailer\Mailer($transport);

        $email = (new Email())
            ->from(self::$sendFrom)
            ->to("$email")
            ->subject('Invoice')
            ->html($txt);

        $mailer->send($email);
        return true;
    }
}
