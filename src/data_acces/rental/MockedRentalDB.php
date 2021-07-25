<?php

require_once 'vendor/autoload.php';

class MockedRentalDB implements IRentalDA
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    public function store(Rental $rental): int
    {
        return $this->faker->randomNumber(2, true);
    }
}
