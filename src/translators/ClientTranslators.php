<?php

include_once(realpath(dirname(__FILE__) . '/../classes/Client.php'));

class ClientTranslators {

    static public function translateFromArray($source): Client
    {
        if (!empty($source['birthDate']) && !DateTime::createFromFormat('Y-m-d', $source['birthDate']))
            throw new Exception('Invalid birth date');

        $birthDate = empty($source['birthDate']) ? NULL : new DateTime($source['birth_date']);

        return new Client(
            $source['name'],
            $source['phone'],
            $source['shippingAddress'],
            $source['email'],
            $birthDate
        );
    }
}