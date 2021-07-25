<?

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MovieRentHandlerTest extends TestCase
{
    public function testHandleValidRequest()
    {
        $moviesDA = new MockedMoviesDB();
        $clientDA = new MockedClientDB();
        $rentalDA = new MockedRentalDB();

        $costCalculator = new RentInDaysPriceCalculator(40, 10);

        $durationInDays = 10;

        $movieRenterHandler = new MovieRentHandler($durationInDays, $moviesDA, $clientDA, $rentalDA, $costCalculator);

        $client = new Client("Jaydon", "440-328-6222", "7503 Alberto Plains", "Violette_Swift63@yahoo.com", new DateTime("2021-07-25T14:57:51.721Z"));

        $this->assertInstanceOf(
            RentMovieResponse::class,
            $movieRenterHandler->tryRent(1, $client)
        );
    }

    public function testHandleInvalidMovieId()
    {
        $invalidMovieIdmovieDA = new class implements IMoviesDA {

            public function retrive(int $id): Movie
            {
                throw new Exception("Movie does not exist");
            }

            public function update(int $id, Movie $movie): void
            {
                return;
            }
        };

        $clientDA = new MockedClientDB();
        $rentalDA = new MockedRentalDB();

        $costCalculator = new RentInDaysPriceCalculator(40, 10);

        $durationInDays = 10;

        $movieRenterHandler = new MovieRentHandler($durationInDays, $invalidMovieIdmovieDA, $clientDA, $rentalDA, $costCalculator);

        $client = new Client("Jaydon", "440-328-6222", "7503 Alberto Plains", "Violette_Swift63@yahoo.com", new DateTime("2021-07-25T14:57:51.721Z"));

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Movie does not exist");

        $movieRenterHandler->tryRent(1, $client);

    }

    public function testHandleRentLastCopy()
    {
        $invalidMovieIdmovieDA = new class implements IMoviesDA
        {

            public function retrive(int $id): Movie
            {
                return new Movie("Sharknado", new DateTime("2013-07-11"), 10, 1);
            }

            public function update(int $id, Movie $movie): void
            {
                return;
            }
        };

        $clientDA = new MockedClientDB();
        $rentalDA = new MockedRentalDB();

        $costCalculator = new RentInDaysPriceCalculator(40, 10);

        $durationInDays = 10;

        $movieRenterHandler = new MovieRentHandler($durationInDays, $invalidMovieIdmovieDA, $clientDA, $rentalDA, $costCalculator);

        $client = new Client("Jaydon", "440-328-6222", "7503 Alberto Plains", "Violette_Swift63@yahoo.com", new DateTime("2021-07-25T14:57:51.721Z"));

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Movie does not exist");

        $movieRenterHandler->tryRent(1, $client);
    }
}