<?php

class RentedMovie
{
    public Movie $movie;
    public DateTime $rentEndDate;
    public float $cost;

    public function __construct(Movie $movie, DateTime $rentEndDate, float $cost)
    {
        $this->movie = $movie;
        $this->rentEndDate = $rentEndDate;
        $this->cost = $cost;
    }
}