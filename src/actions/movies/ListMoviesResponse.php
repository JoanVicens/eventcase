<?php

class ListMoviesResponse implements JsonSerializable
{
    private $movies;

    public function __construct(array $movies)
    {
        $this->movies = [];
        
        foreach ($movies as $id => $movie) {
            array_push(
                $this->movies,
                [
                    'id' => $id,
                    'title' => $movie->title,
                    'launchYear' => $movie->launchDate->format('Y'),
                    'avaliableCopies' => $movie->avaliableCopies
                ]
            );
        }
    }

    public function hasMovies(): bool
    {
        return !empty($this->movies);
    }

    public function jsonSerialize()
    {
        return $this->movies;
    }
}