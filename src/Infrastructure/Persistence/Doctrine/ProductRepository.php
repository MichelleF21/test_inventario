<?php

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Domain\Product\Entity\Product;
use App\Infrastructure\Persistence\Doctrine\Entity\ProductDoctrine;
use App\Infrastructure\Persistence\Doctrine\Entity\VariantDoctrine;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;
use App\Domain\Product\Entity\Variant;

//aqui estariamos creando el adaptador y también se tiene que registar el adaptador como servicio (services.yaml)
class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(private EntityManagerInterface $em){}

    public function save(Product $product): void
    {
        $productDoctrine = new ProductDoctrine();
        $productDoctrine->setId($product->getId());
        $productDoctrine->setName($product->getName());
        $productDoctrine->setDescription($product->getDescription());
        $productDoctrine->setBasePrice($product->getBasePrice());
        $productDoctrine->setStock($product->getStock());

        foreach ($product->getVariants() as $variant) {
            $variantDoctrine = new VariantDoctrine();
            $variantDoctrine->setId($variant->getId());
            $variantDoctrine->setSize($variant->getSize());
            $variantDoctrine->setColor($variant->getColor());
            $variantDoctrine->setPrice($variant->getPrice());
            $variantDoctrine->setStock($variant->getStock());
            $variantDoctrine->setImage($variant->getImage());
            $variantDoctrine->setProduct($productDoctrine);

            $productDoctrine->getVariants()->add($variantDoctrine);
        }

        $this->em->persist($productDoctrine);
        $this->em->flush();
    }
    
    public function find(string $id): ?Product
    {
        return null;
    }

    public function findAll(): array
    {
        return [];
    }
    
}