<?php

$dbconn = pg_connect(getenv("DATABASE_URL"));

include_once __DIR__ . '/../models/product.php';

if ($_REQUEST['action'] === 'index') {
    echo json_encode(Products::all());
} else if ($_REQUEST['action'] === 'post') {
    $request_body = file_get_contents('php://input');
    $body_object = json_decode($request_body);
    $new_product = new Product(null, $body_object->name, $body_object->price, $body_object->url, $body_object->store, $body_object->room, $body_object->category, $body_object->bought);
    $all_products = Products::create($new_product);
    echo json_encode($all_products);
} else if ($_REQUEST['action'] === 'update') {
    $request_body = file_get_contents('php://input');
    $body_object = json_decode($request_body);
    $updated_product = new Product($_REQUEST['id'], $body_object->name, $body_object->price, $body_object->url, $body_object->store, $body_object->room, $body_object->category, $body_object->bought);
    $all_products = Products::update($updated_product);
    echo json_encode($all_products);
} else if ($_REQUEST['action'] === 'delete') {
    $all_products = Products::delete($_REQUEST['id']);
    echo json_encode($all_products);
}

?>