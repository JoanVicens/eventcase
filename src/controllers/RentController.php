<?php

use Pecee\SimpleRouter\SimpleRouter;

class RentController 
{
    private IMovieRenter $movieRenter;

    public function __construct(IMovieRenter $movieRenter) {
        $this->movieRenter = $movieRenter;
    }

    public function rentMovie(int $movieId)
    {
        try {

            $translatedClient = ClientTranslators::translateFromArray($_POST);

            return $this->movieRenter->tryRent($movieId, $translatedClient);
            
        } catch (Exception $e) {

            return $e;
        }
    }

    public function rentMovies()
    {
        try {
            $moviesId = $_POST["moviesId"];
            $translatedClient = ClientTranslators::translateFromArray($_POST);
            
            $responses = [];

            foreach($moviesId as $id)
            {
                array_push($responses, $this->movieRenter->tryRent($id, $translatedClient));
            }

            $totalCost = array_reduce($responses, function ($carry, $rentMoiveResponse) {
                return $carry + $rentMoiveResponse->getCost();
            });

            return [
                'movies' => $responses,
                'totalCost' => $totalCost
            ];

        } catch (Exception $e) {

            return $e;
        }
    }
}