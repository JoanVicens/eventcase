<?php

$result = $GLOBALS['rentController']->rentMovies();

require_once 'head.php';

foreach ($result['movies'] as $rentMovieResponse) {
    echo "<div><h2>{$rentMovieResponse->getMovie()->title}</h2><h3>Until: {$rentMovieResponse->getRentEndDate()->format("D d, M")}</h3><h3>Cost: {$rentMovieResponse->getCost()}</h3></div>";
}

?>