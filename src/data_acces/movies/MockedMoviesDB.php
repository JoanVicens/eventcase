<?php

require_once 'vendor/autoload.php';

class MockedMoviesDB implements IMoviesDA
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    public function retrive(int $id): Movie
    {
        $totalCopies = $this->faker->randomDigit();
        
        return new Movie(
            $this->faker->streetName(),
            $this->faker->dateTime(),
            $this->faker->numberBetween(11, 20),
            $this->faker->numberBetween(0, 10),
        );
    }

    public function update(int $id, Movie $movie): void
    {
        return;
    }
}