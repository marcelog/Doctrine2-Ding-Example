<?php
namespace Domain\Repository;

/**
 * @Configuration
 */
class Configuration
{
    /**
     * @Resource
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $entityManager;

    protected function getRepo($entityName)
    {
        return $this->entityManager->getRepository("\\Domain\Entity\\$entityName");
    }

    /** @Bean */
    public function userRepository()
    {
        return $this->getRepo('User');
    }
}
