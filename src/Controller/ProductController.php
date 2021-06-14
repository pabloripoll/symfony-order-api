<?php
namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\JwtAuth;

class ProductController extends AbstractController
{
    private function fromEntity(){
        return $this->getDoctrine()->getRepository(Product::class);
    }

    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(Request $request, JwtAuth $jwtAuth)
    {
        $token = $request->headers->get('Authorization');

        if ($jwtAuth->checkToken($token) === false) {
            $response['code'] = 401;
            $data['message'] = 'token is expired';

        } else {
            $json = $request->get('json', null);
            $response['code'] = 400;

            if ($json != null) {
                $params = json_decode($json, true);
                $name = $params['name'];
                $price = $params['price'];

                $validator = Validation::createValidator();
                
                $name_violations = $validator->validate(
                    $name,
                    [
                        new Assert\Length([
                            'min' => 3,
                            'max' => 64,
                            'minMessage' => 'Product name must be at least {{ limit }} characters long',
                            'maxMessage' => 'Product name cannot be longer than {{ limit }} characters',
                        ])
                    ]
                );
                $price_violations = $validator->validate(
                    $price,
                    [
                        new Assert\Range([
                            'min' => 1.00,
                            'max' => 100.00,
                            'notInRangeMessage' => 'Product price must be between ${{ min }} and ${{ max }}',
                        ])
                    ]
                );

                if ( $name_violations->count() ) {                
                    foreach ($name_violations as $name_violation) $data['message'] = $name_violation->getMessage();
                
                } elseif ( $price_violations->count() ) {                
                    foreach ($price_violations as $price_violation) $data['message'] = $price_violation->getMessage();
                
                } else {
                    $product = $this->fromEntity()->findByName($name);

                    if ($product) {
                        $data['message'] = "Product named “".$name."” already exists.";
                        
                    } else {
                        $response['status'] = 'success';
                        $response['code'] = 200;

                        $entityManager = $this->getDoctrine()->getManager();
                        
                        $product = new Product();
                        $product->setName($name);
                        $product->setPrice($price);

                        $entityManager->persist($product);
                        $entityManager->flush();

                        
                        $data['id']   = $product->getId();
                        $data['name']   = $params['name'];
                        $data['price']  = $params['price'];
                    }

                }

            }
        }

        return new JsonResponse($data, $response['code']);
    }

    /**
     * @Route("/product/{id}", name="read_product")
     */
    public function readProduct(Request $request, JwtAuth $jwtAuth, $id = null)
    {
        $token = $request->headers->get('Authorization');

        if ($jwtAuth->checkToken($token) === false) {            
            $response['code'] = 401;
            $data['message'] = 'token is expired';

        } else {
            $id = (integer) $id;
            $validator = Validation::createValidator();
            $response['code'] = 400;
                
            $id_violations = $validator->validate(
                $id,
                [
                    new Assert\Type('integer'),
                    new Assert\NotBlank(
                        [
                            'message' => 'Insert an integer number.'
                        ]
                    ),                
                    new Assert\Regex(
                        [
                            'pattern' => '/^[0-9]\d*$/',
                            'message' => 'Please use only integer values.'
                        ]
                    ),
                    new Assert\Range([
                        'min' => 1,
                        'max' => 999999999,
                        'notInRangeMessage' => 'Database has a limit of {{ max }}',
                    ])
                ]
            );
            if ( $id_violations->count() ) {
                foreach ($id_violations as $id_violation) $data['message'] = $id_violation->getMessage();

            } else {
                $product = $this->fromEntity()->find($id);

                if (!$product) {
                    $response['code'] = 404;
                    $data['message'] = 'product id '.$id.' not found.';

                } else {
                    $response['code'] = 200;
        
                    $product = $product->jsonSerialize();
                    $data['id']     = $product['id'];
                    $data['name']   = $product['name'];
                    $data['price']  = $product['price'];
                }
            }
        }

        return new JsonResponse($data, $response['code']);
    }

    /**
     * @Route("/product/{id}", name="delete_product")
     */
    public function deleteProduct(Request $request, JwtAuth $jwtAuth, $id = null)
    {
        $token = $request->headers->get('Authorization');

        if ($jwtAuth->checkToken($token) === false) {            
            $response['code'] = 401;
            $data['message'] = 'token is expired';

        } else {
            $id = (integer) $id;
            $validator = Validation::createValidator();
                
            $id_violations = $validator->validate(
                $id,
                [
                    new Assert\Type('integer'),
                    new Assert\NotBlank(
                        [
                            'message' => 'Insert an integer number.'
                        ]
                    ),                
                    new Assert\Regex(
                        [
                            'pattern' => '/^[0-9]\d*$/',
                            'message' => 'Please use only integer values.'
                        ]
                    ),
                    new Assert\Range([
                        'min' => 1,
                        'max' => 999999999,
                        'notInRangeMessage' => 'Database has a limit of {{ max }}',
                    ])
                ]
            );
            if ( $id_violations->count() ) {
                foreach ($id_violations as $id_violation) $data['message'] = $id_violation->getMessage();

            } else {
                $product = $this->fromEntity()->find($id);

                if (!$product) {
                    $response['code'] = 404;
                    $data['message'] = 'product id '.$id.' not found.';

                } else {
                    $product = $product->jsonSerialize();

                    $em = $this->getDoctrine()->getManager();
                    $em->remove($product);
                    $em->flush();

                    $response['status'] = 'success';
                    $response['code'] = 200;

                    $data['message'] = "product named ".$product['name']." has been deleted from database.";
                }
            }
        }

        return new JsonResponse($data, $response['code']);
    }
}
