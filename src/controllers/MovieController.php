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
                    return SimpleRouter::response()->httpCode(400)->json([
                        'message' => 'Invalid filter'
                    ]);
            }

            return $movies;
            //return SimpleRouter::response()->json($movies);

        } catch (Exception $e) {
            
            return SimpleRouter::response()->httpCode(400)->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}