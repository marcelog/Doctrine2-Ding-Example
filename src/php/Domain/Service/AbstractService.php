<?php
namespace Domain\Service;

use Ding\Logger\ILoggerAware;

/**
 * @Component
 */
class AbstractService implements ILoggerAware
{
    /**
     * @Resource
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \Logger
     */
    protected $logger;

    public function setLogger(\Logger $logger)
    {
        $this->logger = $logger;
    }
}

