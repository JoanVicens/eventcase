<?php

$resp = $GLOBALS['movieController']->listMoviesMatching($filter);

require_once 'head.php';

?>

<main>
    <h1>Avaliable movies</h1>
    <div class="list-grid">
        <?php
        foreach ($resp->getMovies() as $movie) {
        ?>
            <div class="card">
                <h2>
                    <?php echo $movie['title'] ?>
                </h2>

                <span>
                    <small>Launched on:</small>
                    <p>
                        <?php echo $movie['launchYear'] ?>
                    </p>
                </span>
                <span>
                    <small>Avaliable copies: </small>
                    <p>
                        <?php echo $movie['avaliableCopies'] ?>
                    </p>
                </span>

                <a class="button" href="/rent?moviesId[]=<?php echo $movie['id'] ?>">Rent this movie</a>
            </div>
        <?php
        }
        ?>
    </div>
</main>