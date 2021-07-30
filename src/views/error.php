<main class="container pt-4">

    <h1>Some thing whent wrong</h1>

    <div class="alert alert-danger" role="alert">
        <?php echo $result->getMessage() ?>
    </div>

    <a class="btn btn-outline-dark" href="/movies">Back to movies</a>
</main>

<?php

require_once 'footer.php';
