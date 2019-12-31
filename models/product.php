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
}

?>