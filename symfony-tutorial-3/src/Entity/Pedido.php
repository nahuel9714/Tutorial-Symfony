<?php

namespace App\Entity;

use App\Repository\PedidoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidoRepository::class)
 */
class Pedido
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
     * @ORM\ManyToOne(targetEntity=cliente::class, inversedBy="rela1")
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity=Producto::class, inversedBy="rela2")
     */
    private $Producto;

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

    public function getCliente(): ?cliente
    {
        return $this->cliente;
    }

    public function setCliente(?cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getProducto(): ?Producto
    {
        return $this->Producto;
    }

    public function setProducto(?Producto $Producto): self
    {
        $this->Producto = $Producto;

        return $this;
    }
}
