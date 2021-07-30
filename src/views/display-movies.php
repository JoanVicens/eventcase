<?php

$result = $GLOBALS['movieController']->listMoviesMatching($filter);

require_once 'head.php';

if ($result instanceof Exception) {
    require_once 'error.php';
    die();
}

?>

<main class="container pt-4">
    <h1>Choose your movie!</h1>

    <div class="list-grid mt-4">
        <?php

        $movies = $result->getMovies();

        if(count($movies) == 0)
        {
        ?>
            <div class="alert alert-primary" role="alert">
                There are no avaliable movies!
            </div>
        <?php
        }

        foreach ($result->getMovies() as $movie) {
        ?>
            <div class="card">
                <div class="card-body movie-info">
                    <h3 class="card-title">
                        <?php echo $movie['title'] ?>
                    </h3>

                    <h6 class="card-subtitle mb-2 text-muted">
                        <?php echo $movie['launchYear'] ?>
                    </h6>

                    <a class="btn btn-outline-dark" href="/rent?moviesId[]=<?php echo $movie['id'] ?>">I want this one</a>
                </div>
                <div class="card-footer text-muted">
                    Avaliable copies: <?php echo $movie['avaliableCopies'] ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</main>

<?php

require_once 'footer.php';