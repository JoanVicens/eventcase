<?php

$result = $GLOBALS['rentController']->rentMovies();

require_once 'head.php';
?>

<main class="container pt-4">
    <h1>Rent Invoice</h1>

    <div id="result-cards">
        <a class="btn btn-outline-dark" href="/movies">Back to movies</a>

        <?php
        foreach ($result['movies'] as $rentMovieResponse) {
        ?>

            <div class="card">
                <div class="card-header fs-4">
                    <?php echo $rentMovieResponse->getMovie()->title ?>
                </div>
                <div class="card-body fs-6">
                    <p class="card-text">
                        <span class="fw-bold text-uppercase">Until: </span> <?php echo $rentMovieResponse->getRentEndDate()->format("D d, M") ?>
                    </p>
                    <p class="card-text">
                        <span class="fw-bold text-uppercase">Cost: </span>$<?php echo $rentMovieResponse->getCost() ?>
                    </p>
                </div>
            </div>

        <?php } ?>
    </div>
</main>

<?php

require_once 'footer.php';
