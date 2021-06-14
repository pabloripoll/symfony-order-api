<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/login' => [[['_route' => 'admin_login', '_controller' => 'App\\Controller\\AdminUserController::login'], null, ['POST' => 0], null, false, false, null]],
        '/product' => [[['_route' => 'create_product', '_controller' => 'App\\Controller\\ProductController::createProduct'], null, ['POST' => 0], null, false, false, null]],
        '/order' => [[['_route' => 'create_order', '_controller' => 'App\\Controller\\OrderController::createOrder'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/product/([^/]++)(?'
                    .'|(*:62)'
                .')'
                .'|/order/(?'
                    .'|([^/]++)(*:88)'
                    .'|add(*:98)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        62 => [
            [['_route' => 'read_product', '_controller' => 'App\\Controller\\ProductController::readProduct'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null],
            [['_route' => 'delete_product', '_controller' => 'App\\Controller\\ProductController::deleteProduct'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        88 => [[['_route' => 'read_order', '_controller' => 'App\\Controller\\OrderController::readOrder'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        98 => [
            [['_route' => 'complete_order', '_controller' => 'App\\Controller\\OrderController::completeOrder'], [], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
