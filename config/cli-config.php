<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\ORM\DB;

$orm = new DB( __DIR__ . '/../src/Models/', __DIR__ . '/db.php' );
return ConsoleRunner::createHelperSet($orm->getManager());