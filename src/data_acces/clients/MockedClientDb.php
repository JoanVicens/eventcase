<?php

class MockedClientDB implements IClientDA
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    public function store(Client $client): int
    {
        return $this->faker->randomNumber(2, true);
    }
}
