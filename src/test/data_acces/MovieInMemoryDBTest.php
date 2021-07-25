<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


require_once(realpath(dirname(__FILE__) . '/../../data_acces/movies/InMemoryMoviesDB.php'));
require_once(realpath(dirname(__FILE__) . '/../../classes/Movie.php'));

final class MovieInMemoryDBTest extends TestCase
{
    public function testRetriveReturnsAnInstanceOfMovie(): void
    {
        $db = new InMemoryMoviesDB();


        $this->assertInstanceOf(
            Movie::class,
            $db->retrive(1)
        );
        
    }

    public function testRetriveAnInvalidMovie(): void
    {
        $db = new InMemoryMoviesDB();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Movie does not exist");
        
        $db->retrive(999);
    }

    public function testUpdateMovie(): void
    {
        $db = new InMemoryMoviesDB();
        $movieId = 1;

        $lifeOfBrian = new Movie("Monty Python's Life of Brian", new DateTime("2000-12-23"), 3, 1);

        $db->update($movieId, $lifeOfBrian);

        $this->assertEquals(
            $db->retrive($movieId),
            $lifeOfBrian
        );
    }

    public function testUpdateAnInvalidMovie(): void
    {
        $db = new InMemoryMoviesDB();
        $movieId = 2;

        $lifeOfBrian = new Movie("Monty Python's Life of Brian", new DateTime("2000-12-23"), 3, 1);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Movie does not exist");

        $db->update($movieId, $lifeOfBrian);
    }

}
