<?php
namespace Domain\Service;

use Domain\Entity\User as UserEntity;

/**
 * @Component(name="userDomainService")
 */
class User extends AbstractService
{
    /**
     * @Resource
     * @var \Domain\Repository\User
     */
    protected $userRepository;

    public function createUser($username, $password)
    {
        $user = new UserEntity($username, $password);
        $this->entityManager->persist($user);
        return $user;
    }

    public function getById($id)
    {
        return $this->userRepository->find($id);
    }
}

