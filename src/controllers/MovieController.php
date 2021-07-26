<?php

use Pecee\SimpleRouter\SimpleRouter;

class MovieController
{
    private IMovieHandler $movieHandler;

    public function __construct(IMovieHandler $movieHandler)
    {
        $this->movieHandler = $movieHandler;
    }

    public function listMoviesAvaliable()
    {
        try {
            $movies = $this->movieHandler->retriveAvaliable();

            return SimpleRouter::response()->json($movies);

        } catch (Exception $e) {
            
            return SimpleRouter::response()->httpCode(400)->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}