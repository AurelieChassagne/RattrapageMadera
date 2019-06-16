<?php
echo '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />';

date_default_timezone_set('Europe/Paris');

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../app/app.php';
require __DIR__.'/../app/routes.php';

$app->run();
