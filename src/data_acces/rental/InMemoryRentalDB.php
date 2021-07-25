<?php

require_once 'IRentalDA.php';
require_once(realpath(dirname(__FILE__) . '/../../classes/Rental.php'));

class InMemoryRentalDB implements IRentalDA
{
    private $rentals;

    public function __construct()
    {
        $this->rentals = [];
    }

    public function store(Rental $rental): int
    {

        $currentMaxKey = empty($this->rentals)
            ? 0
            : max(array_keys($this->rentals));

        $newMaxKey = $currentMaxKey + 1;
                
        $this->rentals[$newMaxKey] = $rental;

        return $newMaxKey;
    }
}
