<?php
$myDir = realpath(__DIR__ . '/..');
define('ROOT_APPLICATION_PATH', $myDir);
$confDir = $myDir . '/config';
$vendorsDir = $myDir . '/vendor';
$srcDir = $myDir . '/src/php';

require_once 'Ding/Autoloader/Autoloader.php';
\Ding\Autoloader\Autoloader::register();

$annotationDirectories = array(
    $srcDir . '/Domain/Service',
    $srcDir . '/Domain/Repository',
    $srcDir . '/Aspect'
);

$options = array('ding' => array(
    'log4php.properties' => $confDir . '/application.properties',
    'cache' => array(
        'aspect' => array('impl' => 'dummy'),
        'annotations' => array('impl' => 'dummy'),
        'bdef' => array('impl' => 'dummy'),
        'autoloader' => array('impl' => 'dummy'),
        'proxy' => array('impl' => 'dummy')
    ),
    'factory' => array(
        'properties' => array('config.dir' => $confDir),
        'bdef' => array(
            'xml' => array('filename' => 'beans.xml', 'directories' => array($confDir . '/support')),
            'annotation' => array('scanDir' => $annotationDirectories)
        )
    )
));
$container = \Ding\Container\Impl\ContainerImpl::getInstance($options);

