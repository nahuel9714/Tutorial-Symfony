<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente
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
    private $DNI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Pedido::class, mappedBy="cliente")
     */
    private $rela1;

    public function __construct()
    {
        $this->rela1 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDNI(): ?string
    {
        return $this->DNI;
    }

    public function setDNI(string $DNI): self
    {
        $this->DNI = $DNI;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Pedido[]
     */
    public function getRela1(): Collection
    {
        return $this->rela1;
    }

    public function addRela1(Pedido $rela1): self
    {
        if (!$this->rela1->contains($rela1)) {
            $this->rela1[] = $rela1;
            $rela1->setCliente($this);
        }

        return $this;
    }

    public function removeRela1(Pedido $rela1): self
    {
        if ($this->rela1->removeElement($rela1)) {
            // set the owning side to null (unless already changed)
            if ($rela1->getCliente() === $this) {
                $rela1->setCliente(null);
            }
        }

        return $this;
    }
}
