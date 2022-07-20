<?php

namespace App\Entity;

use App\Repository\TestaBeAhRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestaBeAhRepository::class)
 */
class TestaBeAh
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $testa_be_ah;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestaBeAh(): ?string
    {
        return $this->testa_be_ah;
    }

    public function setTestaBeAh(string $testa_be_ah): self
    {
        $this->testa_be_ah = $testa_be_ah;

        return $this;
    }
}
