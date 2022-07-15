<?php

namespace Framework\helpers;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Helper
{
    public static function mail()
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('educationphp7@gmail.com')
            ->setPassword('ubanrfmdebdlrbqs');

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Confirm email'))
            ->setFrom(['educationphp7@gmail.com' => 'NixEducation =^.^= PHP'])
            ->setTo(['nyshnui@gmail.com' => 'Valerii'])
            ->setBody('Here is the message itself');

        // Send the message
        $result = $mailer->send($message);
    }


    public static function dd(array $arr)
    {
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
        exit;
    }

    /**
     * @param array $array Array which you need filtered
     * @param array $params Array params for search
     * When match is found in array will be added to result array
     * @return array Result
     */

    public static function filterArray(array $array, array $params = []): array
    {
        $result = [];
        foreach ($params as $key) {
            foreach ($array as $k => $v) {
                if ($key === $k) {
                    $result[$k] = $v;
                }
            }
        }
        return $result;
    }
}
