<?php

interface IRentalDA
{
    public function store($clientId, $movieId, DateTime $rentStartDate, int $numberOfDaysRented, float $import): int;
}
