<?php

class RentedMovie
{
    public Movie $movie;
    public DateTime $rentEndDate;
    public float $price;

    public function __construct(Movie $movie, DateTime $rentEndDate, float $price)
    {
        $this->movie = $movie;
        $this->rentEndDate = $rentEndDate;
        $this->price = $price;
    }
}