<?php


class MySqlClientDA implements IClientDA
{

    private $clients;

    public function __construct($databaseConnection)
    {
        
        $this->clients = $databaseConnection;
    }
    
    public function store(Client $client): int
    {

        $query = "INSERT INTO Client (Name, Phone, ShippingAddress, email, birthDate) VALUES (:name, :phone, :shippingAddress, :email, :birthDate)";
        
        $preparedQuery = $this->clients->prepare($query);

        $preparedQuery->execute([
            ':name' => $client->name,
            ':phone' => $client->phone,
            ':shippingAddress' => $client->shippingAddress,
            ':email' => $client->email,
            ':birthDate' => $client->birthDate == NULL ? NULL : $client->birthDate->format("Y-m-d")
        ]);
        
        // $preparedQuery->execute();

        return $this->clients->lastInsertId();
    }
}