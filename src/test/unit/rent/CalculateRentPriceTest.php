<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class CalculateRentPriceTest extends TestCase
{

    public function testCalculatePriceWhenThereIsNoCopiesAvaliableShouldFail(): void
    {
        $priceCalculator = new RentInDaysPriceCalculator(0, 0);
        $movie = new Movie("Sharknado", new DateTime("2013-07-11"), 10, 0);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Insuficient copies to calculate the price");

        $priceCalculator->calculate($movie, 1);
    }

    public function testCalulatePriceWhenAllTheCopiesAreAvaliable(): void
    {
        $basePrice = 1;
        $pricePerDay = 1;
        $rendDuration = 5;

        $movie = new Movie("Sharknado", new DateTime("2013-07-11"), 10, 10);
        
        $priceCalculator = new RentInDaysPriceCalculator($basePrice, $pricePerDay);

        $this->assertSame(6.0, $priceCalculator->calculate($movie, $rendDuration));
    }

    public function testBasePriceOfZeroShouldBeOk(): void
    {
        $basePrice = 0;
        $pricePerDay = 1;
        $rendDuration = 5;

        $movie = new Movie("Sharknado", new DateTime("2013-07-11"), 10, 5);

        $priceCalculator = new RentInDaysPriceCalculator($basePrice, $pricePerDay);

        $this->expectNotToPerformAssertions();
        $priceCalculator->calculate($movie, $rendDuration);
    }

    public function testNegativeBasePriceShouldBeOk(): void
    {
        $basePrice = -10;
        $pricePerDay = 1;
        $rendDuration = 5;

        $movie = new Movie("Sharknado", new DateTime("2013-07-11"), 10, 5);

        $priceCalculator = new RentInDaysPriceCalculator($basePrice, $pricePerDay);

        $this->expectNotToPerformAssertions();
        $priceCalculator->calculate($movie, $rendDuration);
    }

    public function testPricePerDayOfZeroShouldBeOk(): void
    {
        $basePrice = 10;
        $pricePerDay = 0;
        $rendDuration = 5;

        $movie = new Movie("Sharknado", new DateTime("2013-07-11"), 10, 5);

        $priceCalculator = new RentInDaysPriceCalculator($basePrice, $pricePerDay);

        $this->expectNotToPerformAssertions();
        $priceCalculator->calculate($movie, $rendDuration);
    }

    public function testNegativePricePerDayShouldBeOk(): void
    {
        $basePrice = 10;
        $pricePerDay = -7;
        $rendDuration = 5;

        $movie = new Movie("Sharknado", new DateTime("2013-07-11"), 10, 5);

        $priceCalculator = new RentInDaysPriceCalculator($basePrice, $pricePerDay);

        $this->expectNotToPerformAssertions();
        $priceCalculator->calculate($movie, $rendDuration);
    }

    public function testRentDurationOfZeroShouldFail(): void
    {
        $basePrice = 8;
        $pricePerDay = 1;
        $rendDuration = 0;

        $movie = new Movie("Sharknado", new DateTime("2013-07-11"), 10, 5);

        $priceCalculator = new RentInDaysPriceCalculator($basePrice, $pricePerDay);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The duration should be greater than 0");

        $priceCalculator->calculate($movie, $rendDuration);
    }
}
