<?php
namespace Domain\Service;

use Domain\Entity\User as UserEntity;
use Ding\Container\IContainerAware;
use Ding\Container\IContainer;

/**
 * @Component(name="userDomainService")
 */
class User extends AbstractService implements IContainerAware
{
    /**
     * @Resource
     * @var \Domain\Repository\User
     */
    protected $userRepository;

    /**
     * @var \Ding\Container\IContainer
     */
    private $_container;

   public function createUser($username, $password)
    {
        $user = new UserEntity($username, $password);
        $this->entityManager->persist($user);
        $this->_container->eventDispatch('newUserCreated', $username);
        return $user;
    }

    public function getById($id)
    {
        return $this->userRepository->find($id);
    }

    public function setContainer(IContainer $container)
    {
        $this->_container = $container;
    }

 }

