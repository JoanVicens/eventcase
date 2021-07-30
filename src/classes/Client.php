<?php

class Client 
{
    public string $name;
    public string $phone;
    public string $shippingAddress;
    public ?string $email;
    public ?DateTime $birthDate;

    public function __construct(
        string $name,
        string $phone,
        string $shippingAddress,
        ?string $email,
        ?DateTime $birthDate
    )
    {

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name))
            throw new Exception("Only letters and white space allowed");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new Exception("Invalid email");

        $this->name = $name;
        $this->phone = $phone;
        $this->shippingAddress = $shippingAddress;
        $this->email = $email;
        $this->birthDate = $birthDate;
    }
}