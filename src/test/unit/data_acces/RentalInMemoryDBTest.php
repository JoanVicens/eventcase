<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RentalInMemoryDBTest extends TestCase
{
    public function testStoreRental(): void
    {
        $db = new InMemoryRentalDB();

        $rental = new Rental(1, 1, new DateTime('NOW'), 29, 45.0);

        $this->assertSame(1, $db->store($rental));
    }
}
