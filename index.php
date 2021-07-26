<?php

require_once 'vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;

# DATABASE CONNECTION
$dbConnection = new MySqlConnection(getenv('MYSQL_DATABASE'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
list($connected, $msg) = $dbConnection->connect();
if(!$connected)
    return SimpleRouter::response()->httpCode(500)->json([
        'message' => $msg
    ]);

# DATABASE
$moviesDA = new MySqlMovieDA($dbConnection->getConnector());
$clientDA = new MySqlClientDA($dbConnection->getConnector());
$rentalDA = new MySqlRentalDA($dbConnection->getConnector());

# RENT MOVIES
$costCalculator = new RentInDaysPriceCalculator(getenv('RENT_BASE_PRICE'), getenv('RENT_PER_DAY'));

# HANDLERS
$movieRenterHandler = new MovieRentHandler(getenv('RENT_DURATION_IN_DAYS'), $moviesDA, $clientDA, $rentalDA, $costCalculator);
$movieHandler = new MovieHandler($moviesDA);

# CONTROLLERS
$rentController = new RentController($movieRenterHandler);
$movieController = new MovieController($movieHandler);

# ROUTES
SimpleRouter::post('/rent/{id}', function($id) {
    return $GLOBALS['rentController'] -> rent($id);
});

SimpleRouter::get('/movies/avaliable', function() {
    return $GLOBALS['movieController'] -> listMoviesAvaliable();
});


SimpleRouter::start();