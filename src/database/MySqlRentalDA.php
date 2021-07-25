<?php


class MySqlRentalDA implements IRentalDA
{

    private $rents;

    public function __construct($databaseConnection)
    {

        $this->rents = $databaseConnection;
    }

    public function store(Rental $rental): int
    {
        $query = "INSERT INTO Rental (MovieId, ClientId, StartDate, NumberOfDaysRented, Price) VALUES (:movieId, :clientId, :startDate, :numberOfDaysRented, :price)";

        $preparedQuery = $this->rents->prepare($query);

        $preparedQuery->execute([
            ':movieId' => $rental->movieId, 
            ':clientId' => $rental->clientId, 
            ':startDate' => $rental->startDate->format('Y-m-d'), 
            ':numberOfDaysRented' => $rental->numberOfDaysRented, 
            ':price' => $rental->price
        ]);

        return $this->rents->lastInsertId();
    }

}
