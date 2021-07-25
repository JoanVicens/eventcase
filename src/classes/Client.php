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
        $this->name = $name;
        $this->phone = $phone;
        $this->shippingAddress = $shippingAddress;
        $this->email = $email;
        $this->birthDate = $birthDate;
    }
}