<?php

class Movie
{
    public string $title;
    public DateTime $launchDate;
    public int $totalCopies;
    public int $avaliableCopies;

    public function __construct(
        string $title,
        DateTime $launchDate,
        int $totalCopies,
        int $avaliableCopies)
    {
        $this->title = $title;
        $this->launchDate = $launchDate;
        $this->totalCopies = $totalCopies;
        $this->avaliableCopies = $avaliableCopies;
    }

    public function removeOneCopy()
    {
        $this->avaliableCopies--;
    }
}