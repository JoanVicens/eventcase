<?php

require_once(realpath(dirname(__FILE__) . '/../../classes/Movie.php'));
require_once(realpath(dirname(__FILE__) . '/../../classes/Client.php'));


interface IRentalDA
{
    public function store(Rental $rental): int;
}
