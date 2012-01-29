<?php
namespace Listeners;

use Ding\Logger\ILoggerAware;

/**
 * @Component
 * @ListensOn(value=newUserCreated)
 */
class NewUser implements ILoggerAware
{
    /**
     * @var \Logger
     */
    private $_logger;
    
   /**
     * Called by the container.
     *
     * @param string $name The created username
     *
     * @return void
     */
    public function onNewUserCreated($name)
    {
        $this->_logger->debug("New user: $name");
    }

    public function setLogger(\Logger $logger)
    {
        $this->_logger = $logger;
    }

}
