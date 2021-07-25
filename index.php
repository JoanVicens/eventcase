<?php

require_once 'vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;

# DATABASE
$moviesDA = new InMemoryMoviesDB();
$clientDA = new InMemoryClientDB();
$rentalDA = new InMemoryRentalDB();

# RENT MOVIES
$costCalculator = new RentInDaysPriceCalculator(getenv('RENT_BASE_PRICE'), getenv('RENT_PER_DAY'));

# HANDLERS
$movieRenterHandler = new MovieRentHandler(getenv('RENT_DURATION_IN_DAYS'), $moviesDA, $clientDA, $rentalDA, $costCalculator);

# CONTROLLERS
$rentController = new RentController($movieRenterHandler);

# ROUTES
SimpleRouter::post('/rent/{id}', function($id) {
    return $GLOBALS["rentController"] -> rent($id);
});



SimpleRouter::start();