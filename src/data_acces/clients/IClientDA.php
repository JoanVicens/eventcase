<?php

require_once(realpath(dirname(__FILE__) . '/../../classes/Client.php'));

interface IClientDA {

    public function store(Client $client): int;

}

