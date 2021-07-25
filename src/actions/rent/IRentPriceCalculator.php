<?php

interface IRentPriceCalculator
{
    public function calculate(Movie $movie, int $durationInDays): float;
}