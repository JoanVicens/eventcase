<?php

interface IMoviesDA {

    public function retrive(int $id): Movie;
    public function update(int $id, Movie $movie): void;
}