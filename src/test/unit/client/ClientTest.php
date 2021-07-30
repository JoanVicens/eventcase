<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    public function testCreateCorrectClient()
    {
        $this->assertInstanceOf(
            Client::class,
            new Client('test', '684-304-246', '8528 Deion Curve', 'test@testhost.com', new DateTime('Now'))
        );
    }

    public function testCreateClientWithWitheSpaceInName()
    {
        $this->assertInstanceOf(
            Client::class,
            new Client('test testerino', '684-304-246', '8528 Deion Curve', 'test@testhost.com', new DateTime('Now'))
        );
    }

    public function testCreateClientWithoutRequired()
    {
        $this->assertInstanceOf(
            Client::class,
            new Client('test', '684-304-246', '8528 Deion Curve', NULL, NULL)
        );
    }

    public function testCreateClientWithInvalidEmail()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid email');

        new Client('test', '684-304-246', '8528 Deion Curve', 'invalidEmail', NULL);
    }

    public function testCreateClientWithInvalidName()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid name: only letters and white space allowed');

        new Client('in4lid name', '684-304-246', '8528 Deion Curve', 'invalidEmail', NULL);
        new Client('inalid%name', '684-304-246', '8528 Deion Curve', 'invalidEmail', NULL);
        new Client('inalid/name', '684-304-246', '8528 Deion Curve', 'invalidEmail', NULL);
    }

}