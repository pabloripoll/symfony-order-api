<?php
namespace App\Controller;

use App\Entity\Order;
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

class OrderController extends AbstractController
{
    private function fromEntity(){
        return $this->getDoctrine()->getRepository(Order::class);
    }

    /**
     * @Route("/order", name="create_order")
     */
    public function createOrder(Request $request, JwtAuth $jwtAuth)
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
                $total_price = $params['total_price'];

                if ( !empty($total_price) || $total_price != 0 ) {                
                    $data['message'] = 'Total price must be 0 or empty';
                
                } else {
                    $total_price = 0;

                    $entityManager = $this->getDoctrine()->getManager();
                    
                    $order = new Order();
                    $order->setTotalPrice($total_price);

                    $entityManager->persist($order);
                    $entityManager->flush();
                    
                    $data['id']   = $order->getId();
                    $data['total_price']  = $total_price;
                }
            }
        }

        return new JsonResponse($data, $response['code']);
    }    

    /**
     * @Route("/order/{orderID}", name="read_order")
     */
    public function readOrder(Request $request, JwtAuth $jwtAuth, $id = null)
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
                $order = $this->fromEntity()->find($id);

                if (!$order) {
                    $response['code'] = 404;
                    $data['message'] = 'Order id '.$id.' not found.';

                } else {
                    $response['code'] = 200;        
                    $order = $order->jsonSerialize();
                    $data['id']          = $order['id'];
                    $data['total_price'] = $order['total_price'];
                    $data['products']    = $order['products'];
                }
            }
        }

        return new JsonResponse($data, $response['code']);
    }

    /**
     * @Route("/order/product/add", name="complete_order")
     */
    public function completeOrder(Request $request, JwtAuth $jwtAuth)
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
                $id = $params['id'];
                
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
                    $order = $this->fromEntity()->find($id);
                    if (!$order) {
                        $response['code'] = 404;
                        $data['message'] = 'Order id '.$id.' not found.';

                    } else {
                        $response['code'] = 200;
                        $total_price = 0;
                        $products_repo = $this->getDoctrine()->getRepository(Product::class);                        

                        foreach ($params['products'] as $request) {
                            $obj = new \stdClass;
                            $obj->id = $request['id'];
                            $obj->quantity = $request['quantity'];

                            $product = $products_repo->find($obj->id);                            
                            if($product) {
                                $product = $product->jsonSerialize();
                                $total_price += $product['price'] * $obj->quantity;
                                //
                                @$products[] = $obj;
                            }                            
                        }
                        $params['total_price'] = $total_price;
                        $params['products'] = $products ?? '';

                        $entityManager = $this->getDoctrine()->getManager();
                    
                        $order->setTotalPrice($params['total_price']);
                        $order->setProducts(json_encode($params['products']));

                        $entityManager->persist($order);
                        $entityManager->flush();

                        $products_count = count($products);
                        $products_count == 1 ? $text = $products_count.' product' : $text = $products_count.' products';

                        $data = $params;
                        
                    }
                }                
            }
        }

        return new JsonResponse($data, $response['code']);
    }

}
