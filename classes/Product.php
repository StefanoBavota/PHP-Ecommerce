<?php 

class Product {

    public $id;
    public $image;
    public $name;
    public $price;
    public $description;
    public $category_id;

    public function __construct($id, $image, $name, $price, $description, $category_id){
        $this->id = (int)$id;
        $this->image = $image;
        $this->name = $name;
        $this->price = (float)$price;
        $this->description = $description;
        $this->category_id = (int)$category_id;
    }
}

class ProductManager extends DBManager {

    public function __construct(){
        parent::__construct();
        $this->columns = array('id','image', 'name', 'price', 'description', 'category_id');
        $this->tableName = 'product';
    }

    // public Methods
}