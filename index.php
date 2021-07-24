
<?php
require 'vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', function () {
    return 'Hello world';
});

SimpleRouter::start();