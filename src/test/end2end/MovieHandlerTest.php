<?

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MovieHandlerTest extends TestCase
{
    public function testHandleFindsMovies()
    {
        $moviesDA = new MockedMoviesDB();


        $movieHandler = new MovieHandler($moviesDA);

        $this->assertInstanceOf(
            ListMoviesResponse::class,
            $movieHandler->retriveAvaliable()
        );
    }

    public function testHandleDoesNotFindsMovies()
    {
        $emptyMovieIdmovieDA = new class implements IMoviesDA
        {

            public function retriveAvaliable(): array
            {
                return [];
            }

            public function retrive(int $id): Movie
            {
                throw new Exception("Method not implemented");
            }

            public function update(int $id, Movie $movie): void
            {
                throw new Exception("Method not implemented");
            }

        };

        $movieHandler = new MovieHandler($emptyMovieIdmovieDA);

        $response = $movieHandler->retriveAvaliable();

        $this->assertNotTrue($response->hasMovies());
    }
}
