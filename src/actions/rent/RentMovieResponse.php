<?php

class RentMovieResponse implements JsonSerializable
{
    private Movie $movie;
    private DateTime $rentEndDate;
    private float $cost;

    public function __construct(Movie $movie, DateTime $rentEndDate, float $cost)
    {
        $this->movie = $movie;
        $this->rentEndDate = $rentEndDate;
        $this->cost = $cost;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getRentEndDate():  DateTime
    {
        return $this->rentEndDate;
    }

    public function jsonSerialize()
    {
        return [
            'title' => $this->movie->title,
            'rentalEnd' => $this->rentEndDate->format("Y-m-d"),
            'cost' => $this->cost
        ];
    }
}