<?php

include_once 'IMovieRenter.php';
include_once 'RentMovieResponse.php';
include_once(realpath(dirname(__FILE__) . '/../../data_acces/movies/IMovieDA.php'));
include_once(realpath(dirname(__FILE__) . '/../../classes/Client.php'));


class MovieRentHandler implements IMovieRenter
{

    private int $durationInDays;
    private IMoviesDA $movieDA;
    private IClientDA $clientDA;
    private IRentalDA $rentalDA;
    private IRentPriceCalculator $priceCalculator;

    public function __construct(int $durationInDays, IMoviesDA $movieDA, IClientDA $clientDA, IRentalDA $rentalDA, IRentPriceCalculator $priceCalculator)
    {
        $this->durationInDays = $durationInDays;
        $this->movieDA = $movieDA;
        $this->clientDA = $clientDA;
        $this->rentalDA = $rentalDA;
        $this->priceCalculator = $priceCalculator;
    }

    public function tryRent(int $movieId, Client $client): RentMovieResponse
    {
        $movie = $this->movieDA->retrive($movieId);
        
        $price = $this->priceCalculator->calculate($movie, $this->durationInDays);
        
        $movie->removeOneCopy($movieId);
        
        $clientId = $this->clientDA->store($client);
        $rental = new Rental($movieId, $clientId, new DateTime('NOW'), $this->durationInDays, $price);
        
        $this->movieDA->update($movieId, $movie);
        $this->rentalDA->store($rental);

        return new RentMovieResponse($movie, $rental->endOfRental(), $price);
    }
}