<?php

include_once(realpath(dirname(__FILE__) . '/../classes/Client.php'));

class ClientTranslators {

    static public function translateFromArray($source): Client
    {   
        $birthDate = $source->birth_date == NULL ? NULL : new DateTime($source->birth_date);

        return new Client(
            $source->name,
            $source->phone,
            $source->shipping_address,
            $source->email,
            $birthDate
        );
    }
}