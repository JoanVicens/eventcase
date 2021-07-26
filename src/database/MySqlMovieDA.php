<?php


class MySqlMovieDA implements IMoviesDA
{

    private $movies;

    public function __construct($databaseConnection)
    {

        $this->movies = $databaseConnection;
    }

    public function retrive(int $id): Movie
    {
        $query = "SELECT Title, LaunchDate, TotalCopies, AvaliableCopies FROM Movie WHERE MovieId = :id";

        $preparedQuery = $this->movies->prepare($query);

        $preparedQuery->bindParam(':id', $id);

        $preparedQuery->execute();

        $result = $preparedQuery->fetchAll(PDO::FETCH_NUM)[0];

        return new Movie($result[0], new DateTime($result[1]), $result[2], $result[3]);
    }


    public function update(int $id, Movie $movie): void
    {
        $query = "UPDATE Movie SET Title = :title, LaunchDate = :launchDate, TotalCopies = :totalCopies, AvaliableCopies = :avaliableCopies WHERE MovieId = :movieId";

        $preparedQuery = $this->movies->prepare($query);

        $preparedQuery->execute([
            ':title' => $movie->title,
            ':launchDate' => $movie->launchDate->format("Y-m-d"),
            ':totalCopies' => $movie->totalCopies,
            ':avaliableCopies' => $movie->avaliableCopies,
            ':movieId' => $id
        ]);
    }


}
