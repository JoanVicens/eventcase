<?php

include_once(realpath(dirname(__FILE__) . '/../classes/Client.php'));

class ClientTranslators {

    static public function translateFromArray($source): Client
    {   
        $birthDate = empty($source['birth_date']) ? NULL : new DateTime($source['birth_date']);

        return new Client(
            $source['name'],
            $source['phone'],
            $source['shippingAddress'],
            $source['email'],
            $birthDate
        );
    }
}