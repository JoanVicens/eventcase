<?php

use Pecee\SimpleRouter\SimpleRouter;

class RentController 
{
    private IMovieRenter $movieRenter;

    public function __construct(IMovieRenter $movieRenter) {
        $this->movieRenter = $movieRenter;
    }

    public function rent(int $movieId)
    {
        try {

            $json = file_get_contents('php://input');
            $client = json_decode($json);

            $translatedClient = ClientTranslators::translateFromArray($client);

            $movieRented = $this->movieRenter->tryRent($movieId, $translatedClient);
            
            return SimpleRouter::response()->json($movieRented);

        } catch (Exception $e) {

            return SimpleRouter::response()->httpCode(400)->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}