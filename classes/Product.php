<?php 

class ProductManager extends DBManager {

    public function __construct(){
        parent::__construct();
        $this->columns = array('id','image', 'name', 'price', 'description', 'category_id');
        $this->tableName = 'product';
    }

    // public Methods

    public function insert($image, $name, $price, $description, $category_id){

        $product = $this->create([
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'category_id' => $category_id
        ]);

        return $product;
    }
}