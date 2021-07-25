<?php

require_once 'IClientDA.php';
require_once(realpath(dirname(__FILE__) . '/../../classes/Client.php'));

class InMemoryClientDB implements IClientDA {

    private $clients;

    public function __construct()
    {
        $this->clients = [];
    }

    public function store(Client $client): int
    {
        $currentMaxKey = empty($this->clients)
            ? 0 
            : max(array_keys($this->clients));

        $newMaxKey = $currentMaxKey + 1;

        $this->clients[$newMaxKey] = $client;
        
        return $newMaxKey;
    }
}