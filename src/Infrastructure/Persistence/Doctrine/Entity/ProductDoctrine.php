<?php

namespace App\Infrastructure\Persistence\Doctrine\Entity;

use App\Infrastructure\Persistence\Doctrine\Entity\VariantDoctrine;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: "products")]
class ProductDoctrine
{
    #[ORM\Id]
    #[ORM\Column(type: "string")]
    private string $id;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private string $description;

    #[ORM\Column(type: "float")]
    private float $basePrice;

    #[ORM\Column(type: "integer")]
    private int $stock;

    #[ORM\OneToMany(mappedBy: "product", targetEntity: VariantDoctrine::class, cascade: ["persist"], orphanRemoval: true)]
    private Collection $variants;
    // private $variants;

    
    public function __construct()
    {
        $this->variants = new ArrayCollection();
    }

    public function getVariants(): Collection
    {
        return $this->variants;
    }

    public function addVariant(VariantDoctrine $variant): void
    {
        if (!$this->variants->contains($variant)) {
            $this->variants[] = $variant;
            $variant->setProduct($this); // relación inversa
    }
        // $this->variants[] = $variant;
        // $variant->setProduct($this); // importante: setear el inverso
    }

    //getters y setters para que la api los tome
    //id
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    //name
        public function setname(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    //description
        public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    //basePrice
        public function setbasePrice(float $basePrice): void
    {
        $this->basePrice = $basePrice;
    }

    public function getbasePrice(): float
    {
        return $this->basePrice;
    }

    //stock
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getStock(): int
    {
        return $this->stock;
    }
}