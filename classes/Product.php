<?php

class Product
{

    public $id;
    public $image;
    public $name;
    public $price;
    public $description;
    public $category_id;

    public function __construct($id, $image, $name, $price, $description, $category_id)
    {
        $this->id = (int)$id;
        $this->image = $image;
        $this->name = $name;
        $this->price = (float)$price;
        $this->description = $description;
        $this->category_id = (int)$category_id;
    }
}

class ProductManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->columns = array('id', 'image', 'name', 'price', 'description', 'category_id');
        $this->tableName = 'product';
    }

    // public Methods
    public function addToWishList($productId, $userId)
    {
        $resultSet = $this->db->execute("INSERT INTO wish_list (product_id, user_id) VALUES ($productId, $userId)");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito l\'oggetto nella wishlist');
        }
        return array('error' => '');
    }

    public function getCurrentUserWishlist($userId)
    {
        $sql = "SELECT image, name, description, price, product_id, wish_list.id AS wish_list_id FROM product INNER JOIN wish_list ON wish_list.product_id = product.id AND wish_list.user_id = $userId";
        return $this->db->query($sql);
    }

    public function countCurrentUserWishlistProductsAmount($userId)
    {
        $sql = "SELECT COUNT(*) as amount FROM product INNER JOIN wish_list ON wish_list.product_id = product.id AND wish_list.user_id = $userId";
        return $this->db->query($sql);
    }

    public function addBrand($brand)
    {
        $resultSet = $this->db->execute("INSERT INTO brand (name) VALUES ('$brand')");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito il Brand');
        }
        return array('error' => '');
    }

    public function addCategory($category)
    {
        $resultSet = $this->db->execute("INSERT INTO category (name) VALUES ('$category')");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito la Categoria');
        }
        return array('error' => '');
    }

    public function addPayment($payment)
    {
        $resultSet = $this->db->execute("INSERT INTO payment (type) VALUES ('$payment')");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito il Metodo di pagamento');
        }
        return array('error' => '');
    }

    public function addMerchant($merchant)
    {
        $resultSet = $this->db->execute("INSERT INTO merchants (name) VALUES ('$merchant')");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito il Fornitore');
        }
        return array('error' => '');
    }

    public function getAllBrand()
    {
        $sql = "SELECT * FROM brand";
        return $this->db->query($sql);
    }

    public function getAllCategory()
    {
        $sql = "SELECT * FROM category";
        return $this->db->query($sql);
    }

    public function getAllPayment()
    {
        $sql = "SELECT * FROM payment";
        return $this->db->query($sql);
    }

    public function getAllMerchant()
    {
        $sql = "SELECT * FROM merchants";
        return $this->db->query($sql);
    }

    public function deleteBrand($id)
    {
        $rowsDeleted = $this->db->delete_one("brand", (int)$id);
        return (int) $rowsDeleted;
    }
    
    public function deleteCategory($id)
    {
        $rowsDeleted = $this->db->delete_one("category", (int)$id);
        return (int) $rowsDeleted;
    }
    
    public function deletePayment($id)
    {
        $rowsDeleted = $this->db->delete_one("payment", (int)$id);
        return (int) $rowsDeleted;
    }

    public function deleteMerchant($id)
    {
        $rowsDeleted = $this->db->delete_one("merchants", (int)$id);
        return (int) $rowsDeleted;
    }
}
