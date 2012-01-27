<?php
require_once __DIR__ . '/../bootstrap.php';

$em = $container->getBean('entityManager');
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

$cli = new \Symfony\Component\Console\Application(
        'Doctrine Command Line Interface', \Doctrine\ORM\Version::VERSION
);
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);
Doctrine\ORM\Tools\Console\ConsoleRunner::addCommands($cli);
$cli->run();

