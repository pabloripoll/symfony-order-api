<?php

namespace App\Entity;

use App\Repository\AdminUserRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Tools\Timestamps;

/**
 * AdminUser
 * 
 * @ORM\Table(name="admin_users")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class AdminUser implements \JsonSerializable
{
    /**
     * @var int
     * 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=64)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    // JSON
    public function jsonSerialize()
    {
        return [
            'id'    => $this->id,
            'user'  => $this->user,
        ];
    }

}
