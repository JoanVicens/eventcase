<?php

class Rental
{
    public int $movieId;
    public int $clientId;
    public DateTime $startDate;
    public int $numberOfDaysRented;
    public float $price;

    public function __construct(int $movieId, int $clientId, DateTime $startDate, int $numberOfDaysRented, float $price)
    {
        $this->movieId = $movieId;
        $this->clientId = $clientId;
        $this->startDate = $startDate;
        $this->numberOfDaysRented = $numberOfDaysRented;
        $this->price = $price;
    }

    public function endOfRental(): DateTime
    {
        $duration = "P" . $this->numberOfDaysRented . "D";
        $interval = new DateInterval($duration);

        return $this->startDate->add($interval);
    }
}