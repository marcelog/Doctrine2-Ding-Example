<?php
namespace Domain\Entity;

/**
 * @Entity(repositoryClass="\Domain\Repository\User")
 */
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var integer
     */
    protected $id;
    /**
     * @Column(type="string", length="16", nullable="false", unique="true")
     * @var string
     */
    protected $username;
    /**
     * @Column(type="string", length="16", nullable="false")
     * @var string
     */
    protected $password;

    public function __toString()
    {
        return "[User: " . $this->id . ": " . $this->username . " ]";
    }

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}

