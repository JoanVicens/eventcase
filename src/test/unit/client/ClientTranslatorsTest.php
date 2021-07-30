<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ClientTranslatorsTest extends TestCase
{
    public function testTranslateCorrectClient()
    {
        $this->assertInstanceOf(
            Client::class,
            ClientTranslators::translateFromArray([
                'name' => 'test',
                'phone' => '684-304-246',
                'shippingAddress' => '8528 Deion Curve',
                'email' => 'test@testhost.com',
                'birthDate' => '1994-12-24'
            ])
        );
    }

    public function testTranslateCorrectClientWithoutRequired()
    {
        $this->assertInstanceOf(
            Client::class,
            ClientTranslators::translateFromArray([
                'name' => 'test',
                'phone' => '684-304-246',
                'shippingAddress' => '8528 Deion Curve'
            ])
        );
    }

    public function testTranslateClientWithIncorrectBirthDate()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid birth date');
        
        ClientTranslators::translateFromArray([
            'name' => 'test',
            'phone' => '684-304-246',
            'shippingAddress' => '8528 Deion Curve',
            'birthDate' => 'not a valid date time'
        ]);
    }
}
