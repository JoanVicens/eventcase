<?php

use Pecee\SimpleRouter\SimpleRouter;

class MovieController
{
    private IMovieHandler $movieHandler;

    public function __construct(IMovieHandler $movieHandler)
    {
        $this->movieHandler = $movieHandler;
    }

    public function listMoviesMatching($filter)
    {
        try {

            switch(trim(strtoupper($filter)))
            {
                case MovieFilters::Avaliable:
                    $movies = $this->movieHandler->retriveAvaliable();
                    break;

                default: 
                    return new Exception('Invalid filter');
            }

            return $movies;

        } catch (Exception $e) {
            
            return SimpleRouter::response()->httpCode(400)->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}