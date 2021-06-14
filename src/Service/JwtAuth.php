<?php
namespace App\Service;

use Firebase\JWT\JWT;
use App\Entity\AdminUser;

class JwtAuth
{
    private $manager;
    private $secretKey;

    public function __construct($manager)
    {
        $this->manager = $manager;
        $this->secretKey = $_SERVER['APP_SECRET'];
    }

    public function closeRequests()
    {
        header('HTTP/1.1 401 Unauthorized');
        exit;
    }

    public function checkToken($jwt)
    {
        $now = new \DateTimeImmutable();
        $jwt = substr($jwt, 7);
        $auth = false;

        try {
            $token = JWT::decode($jwt, $this->secretKey, ['HS512']);

            //isset($token) && !empty($token) && is_object($token) ? $auth = true : null;
            $token->nbf < $now->getTimestamp() || $token->exp > $now->getTimestamp() ? $auth = true : null;

        } catch(\UnexpectedValueException $e) {
            $auth = false;
        } catch(\UnexpectedValueException $e) {
            $auth = false;
        } catch(\ExpiredException $e) {
            $auth = false;
        }
        
        return $auth;
    }

    public function userToken($params, $decodeToken = null)
    {
        if ($decodeToken) {
            $token = substr($params, 7);
            $jwt = JWT::decode($token, $this->secretKey, ['HS512']);
            
        } else {
            $issuedAt   = new \DateTimeImmutable();
            $expire     = $issuedAt->modify('+5 minutes')->getTimestamp();
            //$serverName = "your.domain.name";
            $username   = "username";

            $token = [
                'iat'  => $issuedAt->getTimestamp(),
                //'iss'  => $serverName,
                'nbf'  => $issuedAt->getTimestamp(), // Not before
                'exp'  => $expire,
                'user' => $params['user'],
            ];
    
            $jwt = 'Bearer '.JWT::encode($token, $this->secretKey, 'HS512');
        }

        return $jwt;
    }

}