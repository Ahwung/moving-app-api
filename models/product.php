<?php

Class Product {
    public $id;
    public $name;
    public $price;
    public $url;
    public $store;
    public $room;
    public $category;
    public $bought;

    public function __construct($id, $name, $price, $url, $store, $room, $category, $bought) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->url = $url;
        $this->store = $store;
        $this->room = $room;
        $this->category = $category;
        $this->bought = $bought;
    }
}

Class Products {
    static function all() {

        $products = array();

        $results = pg_query("SELECT * FROM products");

        $row_object = pg_fetch_object($results);
        while($row_object) {
            $new_product = new Product(
                intval($row_object->id),
                $row_object->name,
                intval($row_object->price),
                $row_object->url,
                $row_object->store,
                $row_object->room,
                $row_object->category,
                $row_object->bought
            );
            $products[] = $new_product;
            $row_object = pg_fetch_object($results);
        }
        return $products;
    }

    static function create($product) {
        $query = "INSERT INTO products (name, price, url, store, room, category) VALUES ($1, $2, $3, $4, $5, $6)";
        $query_params = array($product->name, $product->price, $product->url, $product->room, $product->category);
        $result = pg_query_params($query, $query_params);

        return self::all();
    }

    static function update($updated_product) {
        $query = "UPDATE products SET name = $1, price = $2, url = $3, store = $4, room = $5, category = $6 WHERE id = $7";
        $query_params = array($updated_product->name, $updated_product->price, $updated_product->url, $updated_product->store, $updated_product->room, $updated_product->category, $updated_product->id);
        $result = pg_query_params($query, $query_params);
        
        return self::all();
    }

    static function delete() {
        $query = "DELETE FROM products WHERE id=$1";
        $query_params = array($id);
        $result = pg_query_params($query, $query_params);

        return self::all();
    }
}

?>