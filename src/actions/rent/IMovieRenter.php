<?php

interface IMovieRenter {
    public function tryRent(int $id, Client $client): RentMovieResponse;
}