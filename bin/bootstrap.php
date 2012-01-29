<?php
// Establish absolute application root path
$myDir = realpath(__DIR__ . '/..');
define('ROOT_APPLICATION_PATH', $myDir);
$confDir = $myDir . '/config';
$vendorsDir = $myDir . '/vendor';
$srcDir = $myDir . '/src/php';

// The ding autoloader needs to be registered. Any 
// PSR-0 compliant autoloader will also do fine.
require_once 'Ding/Autoloader/Autoloader.php';
Ding\Autoloader\Autoloader::register();
use Ding\Container\Impl\ContainerImpl as DingContainer;

// We will be using annotations throughout all of
// the code, so let's tell ding to traverse and discover
// the annotations in these directories.
$annotationDirectories = array(
    $srcDir . '/Listeners',
    $srcDir . '/Domain/Service',
    $srcDir . '/Domain/Repository',
    $srcDir . '/Aspect'
);

/*
 * Container options:
 *   - The log4php configuration file will
 *     be config/application.properties
 *   - Dont use any cache (you should have cache for production
 *     environments).
 *   - The container will have an additional properties file, 
 *     specified also as config/application.properties
 *   - Bean providers: Not only we will use annotations in the
 *     classes "living" in the above specified directories, but also
 *     xml definitions residing in config/support/beans.xml.
 *   - Also, a single property is injected in the container, the 
 *     'config.dir' property will have the absolute path to our /config
 *     directory.
 */
$options = array('ding' => array(
    'log4php.properties'
        => $confDir . '/application.properties',
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
            'xml' => array(
                'filename' => 'beans.xml',
                'directories' => array($confDir . '/support')
            ),
            'annotation' => array(
                'scanDir' => $annotationDirectories
            )
        )
    )
));
// Get the container instance.
$container = DingContainer::getInstance($options);

