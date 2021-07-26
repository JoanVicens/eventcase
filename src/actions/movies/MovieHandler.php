<?php

class MovieHandler implements IMovieHandler
{

    private IMoviesDA $movieDA;

    public function __construct(IMoviesDA $movieDA)
    {
        $this->movieDA = $movieDA;
    }

    public function retriveAvaliable(): ListMoviesResponse
    {
        $movies = $this->movieDA->retriveAvaliable();

        $return = new ListMoviesResponse($movies);
            
        return $return;
    }
}