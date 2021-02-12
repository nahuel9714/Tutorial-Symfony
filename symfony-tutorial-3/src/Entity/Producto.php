<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
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
    private $referencia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Pedido::class, mappedBy="Producto")
     */
    private $rela2;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $Precio;

    public function __construct()
    {
        $this->rela2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): self
    {
        $this->referencia = $referencia;

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
    public function getRela2(): Collection
    {
        return $this->rela2;
    }

    public function addRela2(Pedido $rela2): self
    {
        if (!$this->rela2->contains($rela2)) {
            $this->rela2[] = $rela2;
            $rela2->setProducto($this);
        }

        return $this;
    }

    public function removeRela2(Pedido $rela2): self
    {
        if ($this->rela2->removeElement($rela2)) {
            // set the owning side to null (unless already changed)
            if ($rela2->getProducto() === $this) {
                $rela2->setProducto(null);
            }
        }

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->Precio;
    }

    public function setPrecio(string $Precio): self
    {
        $this->Precio = $Precio;

        return $this;
    }
}
