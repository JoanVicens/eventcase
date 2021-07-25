<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


require_once(realpath(dirname(__FILE__) . '/../../data_acces/clients/InMemoryClientDB.php'));
require_once(realpath(dirname(__FILE__) . '/../../classes/Client.php'));

final class ClientInMemoryDBTest extends TestCase
{
    public function testClientIsStoredWhenDBIsEmtpy(): void
    {
        $db = new InMemoryClientDB();

        $client = new Client("Aurore", "12345789", "84813 Brekke Mews", "Aurore60@yahoo.com", new DateTime("2021-07-25"));


        $this->assertSame(1, $db->store($client));
    }

}