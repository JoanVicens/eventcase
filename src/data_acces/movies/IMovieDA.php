<?php

interface IMoviesDA {

    public function retrive(int $id): Movie;
    public function retriveAvaliable(): array; 
    public function update(int $id, Movie $movie): void;
}