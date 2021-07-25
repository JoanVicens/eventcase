<?php

require_once 'IRentPriceCalculator.php';

class RentInDaysPriceCalculator implements IRentPriceCalculator
{
    private string $basePrice;
    private string $pricePerDay;

    public function __construct(float $basePrice, float $pricePerDay)
    {
        $this->basePrice = $basePrice;
        $this->pricePerDay = $pricePerDay;
    }

    public function calculate(Movie $movie, int $durationInDays): float
    {
        if($movie->avaliableCopies == 0)
            throw new Exception("Insuficient copies to calculate the price");

        if($durationInDays <= 0)
            throw new Exception("The duration should be greater than 0");

        $percentil = $movie->totalCopies / $movie->avaliableCopies;
        
        return ($this->basePrice * $percentil) + ($this->pricePerDay * $durationInDays);
    }
}