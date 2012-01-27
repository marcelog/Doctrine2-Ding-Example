<?php
require_once __DIR__ . '/bootstrap.php';

$userDomainService = $container->getBean('userDomainService');

array_shift($argv); // we dont care about our filesystem name
$username = array_shift($argv);
$password = array_shift($argv);
$userDomainService->createUser($username, $password);

$user = $userDomainService->getById(1);

echo "$user\n";



