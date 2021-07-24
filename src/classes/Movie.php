<?php

class Movie
{
    public string $title;
    public DateTime $launchYear;
    public int $totalCopies;
    public int $avaliableCopies;

    public function __construct(
        string $title,
        DateTime $launchYear,
        int $totalCopies,
        int $avaliableCopies)
    {
        $this->title = $title;
        $this->launchYear = $launchYear;
        $this->totalCopies = $totalCopies;
        $this->avaliableCopies = $avaliableCopies;
    }

    public function removeOneCopy()
    {
        $this->avaliableCopies--;
    }
}