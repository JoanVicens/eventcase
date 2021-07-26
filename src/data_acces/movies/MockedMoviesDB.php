<?php


class MockedMoviesDB implements IMoviesDA
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    public function retrive(int $id): Movie
    {
        return new Movie(
            $this->faker->streetName(),
            $this->faker->dateTime(),
            $this->faker->numberBetween(11, 20),
            $this->faker->numberBetween(1, 10),
        );
    }

    public function retriveAvaliable(): array
    {
        $totalMovies = $this->faker->numberBetween(10, 30);
        
        $moviesArray = [];

        for ($i = 0; $i < $totalMovies; $i++)
        {
            $moviesArray[$i] = new Movie(
                $this->faker->streetName(),
                $this->faker->dateTime(),
                $this->faker->numberBetween(11, 20),
                $this->faker->numberBetween(1, 10),
            );
        }

        return $moviesArray;
    }

    public function update(int $id, Movie $movie): void
    {
        return;
    }
}