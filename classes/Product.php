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
    public function addToWishList($productId, $userId) {
        $resultSet = $this->db->execute("INSERT INTO wish_list (product_id, user_id) VALUES ($productId, $userId)");
        if(!$resultSet) {
            return array('error' => 'Hai già inserito l\'oggetto nella wishlist');
        }
        return array('error' => '');
    }

    public function getCurrentUserWishlist($userId) {
        $sql = "SELECT image, name, description, price, wish_list.id AS wish_list_id FROM product INNER JOIN wish_list ON wish_list.product_id = product.id AND wish_list.user_id = $userId";
        return $this->db->query($sql);
    }

    public function countCurrentUserWishlistProductsAmount($userId) {
        $sql = "SELECT COUNT(*) as amount FROM product INNER JOIN wish_list ON wish_list.product_id = product.id AND wish_list.user_id = $userId";
        return $this->db->query($sql);
    }

}