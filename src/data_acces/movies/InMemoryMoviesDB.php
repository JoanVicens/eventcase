<?php

require_once 'IMovieDA.php';
require_once(realpath(dirname(__FILE__).'/../../classes/Movie.php'));


class InMemoryMoviesDB implements IMoviesDA {

    private $movies;

    public function __construct()
    {
        $this->movies = [
            1 => new Movie("Sharknado", new DateTime("2013-07-11"), 10, 4)
        ];
    }

    public function retrive(int $id): Movie
    {
        if(!array_key_exists($id, $this->movies))
            throw new Exception("Movie does not exist");

        return $this->movies[$id];
    }

    public function retriveAvaliable(): array
    {
        $avaliableMovies = [];
        
        foreach($this->movies as $id => $movie)
        {
            if($movie->avaliableCopies >= 0)
                $avaliableMovies[$id] = $movie;
        }

        return $avaliableMovies;
    }

    public function update(int $id, Movie $movie): void
    {
        if (!array_key_exists($id, $this->movies))
            throw new Exception("Movie does not exist");

        $this->movies[$id] = $movie;
    }
}