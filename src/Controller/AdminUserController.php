<?php
namespace App\Controller;

use App\Entity\AdminUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\JwtAuth;

class AdminUserController extends AbstractController
{
    private function fromEntity(){
        return $this->getDoctrine()->getRepository(AdminUser::class);
    }

    /**
     * @Route("/product", name="create_product")
     */
    public function login(Request $request, JwtAuth $jwtAuth)
    {
        $token = $request->headers->get('Authorization');

        if ($jwtAuth->checkToken($token) === true) {
            $response['code'] = 200;
            $data['message'] = 'token is active';

        } else {
            $json = $request->get('json', null);
            $response['code']  = 400;

            if ($json != null) {
                $params = json_decode($json, true);
                $user = $params['user'];
                $password = $params['password'];

                $validator = Validation::createValidator();
                
                $user_violations = $validator->validate(
                    $user,
                    [
                        new Assert\NotBlank(
                            [
                                'message' => 'User value is missing.'
                            ]
                        ),
                        new Assert\Regex(
                            [
                                'pattern' => '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/',
                                'message' => 'Insert only allowed user values.'
                            ]
                        ),
                        new Assert\Length([
                            'min' => 8,
                            'max' => 64,
                            'minMessage' => 'User should be at least {{ limit }} characters long',
                            'maxMessage' => 'User lenght cannot be longer than {{ limit }} characters',
                        ])
                    ]
                );
                $password_violations = $validator->validate(
                    $password,
                    [
                        new Assert\NotBlank(
                            [
                                'message' => 'Password value is missing.'
                            ]
                        ),                
                        new Assert\Regex(
                            [
                                'pattern' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/',
                                'message' => 'Insert only allowed password values.'
                            ]
                        ),
                        new Assert\Length([
                            'min' => 8,
                            'max' => 64,
                            'minMessage' => 'Password should be at least {{ limit }} characters long',
                            'maxMessage' => 'Password lenght cannot be longer than {{ limit }} characters',
                        ])
                    ]
                );

                if ( $user_violations->count() ) {                
                    foreach ($user_violations as $user_violation) $data['message'] = $user_violation->getMessage();
                
                } elseif ( $password_violations->count() ) {                
                    foreach ($password_violations as $password_violation) $data['message'] = $password_violation->getMessage();
                
                } else {
                    $password = hash('sha256', $params['password']);
                    $register = $this->fromEntity()->findBy(['user' => $user, 'password' => $password])[0];
                    
                    if (!$register) {
                        $data['message'] = "User ".$user." does not match.";

                    } else {
                        $response['status'] = 'success';
                        $response['code'] = 200;

                        $register = $register->jsonSerialize();
                        $data['Authorization'] = $jwtAuth->userToken($register);
                    }
                }
            }
        }

        return new JsonResponse($data, $response['code']);
    }

}
