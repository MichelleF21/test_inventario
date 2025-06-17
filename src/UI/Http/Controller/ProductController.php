<?php

namespace App\UI\Http\Controller;

use App\Application\Product\Command\CreateProductCommand;
use App\Application\Product\Handler\CreateProductHandler;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Uid\Uuid;

class ProductController extends AbstractController{

    
    #[Route('/api/product', name: 'create_product', methods: ['POST'])]
    
    public function create(Request $request, CreateProductHandler $handler): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if(!isset($data['name'], $data['description'], $data['basePrice'], $data['stock'], $data['variants'])){

            return new JsonResponse(['error' => 'Datos incompletos'], 400);
        }

        //esta generando un id aleatorio del producto
        $productId = Uuid::v4()->toRfc4122();
        //si lo de arriba falla, se puede usar lo siguiente pero no es recomendable del todo
        //y mas si es algo que se vaya a lanzar a producción
        // $productId = bin2hex(random_bytes(16));
        

        $variants = array_map(function ($v) {
            return[
                'id' => Uuid::v4()->toRfc4122(),
                // 'id' => bin2hex(random_bytes(16)),
                'size' => $v['size'],
                'color' => $v['color'],
                'price' => $v['price'],
                'stock' => $v['stock'],
                'image' => $v['image']
            ];
        }, $data['variants']);

        $command = new CreateProductCommand(
            $productId,
            $data['name'],
            $data['description'],
            $data['basePrice'],
            $data['stock'],
            $variants
        );

        $handler($command);

        return new JsonResponse([
            'status' => 'Producto creado con exito',
            'product_id' => $productId
        ], 201);
    }

}