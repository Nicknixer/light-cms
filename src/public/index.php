<?php

require '../../vendor/autoload.php';

$config = require '../settings.php';

$app = new \Slim\App($config);

require '../dependencies.php';

require '../routes.php';

$app->run();