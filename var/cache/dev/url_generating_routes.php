<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    'admin_login' => [[], ['_controller' => 'App\\Controller\\AdminUserController::login'], [], [['text', '/login']], [], []],
    'read_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::readProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], []],
    'create_product' => [[], ['_controller' => 'App\\Controller\\ProductController::createProduct'], [], [['text', '/product']], [], []],
    'delete_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::deleteProduct'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], []],
    'read_order' => [['id'], ['_controller' => 'App\\Controller\\OrderController::readOrder'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/order']], [], []],
    'create_order' => [[], ['_controller' => 'App\\Controller\\OrderController::createOrder'], [], [['text', '/order']], [], []],
    'insert_order_products' => [[], ['_controller' => 'App\\Controller\\OrderController::insertOrderProducts'], [], [['text', '/order/product/add']], [], []],
];
