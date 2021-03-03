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

class ProductManager2 extends DBManager
{
    public function __construct()
    {
        parent::__construct();
        $this->columns = array('id', 'image', 'name', 'price', 'description', 'category_id');
        $this->tableName = 'product';
    }
    /** 
     *  p1, p2, p3
     *  s1, s2
     * 
     *  p1s1 p1s2 p2s1 p2s2 p3s1 p3s2
     * 
    */


    public function getProduct($id) {
        $sql = "SELECT * FROM product INNER JOIN shoe_size ON product.size_id = shoe_size.id WHERE product.id = $id ";
        return $this->db->query($sql);
    }

    public function updateBrand($id, $name)
    {
        return $this->db->execute("UPDATE brand SET name = '$name' WHERE id = $id");
    }

    public function updateCategory($id, $name)
    {
        return $this->db->execute("UPDATE category SET name = '$name' WHERE id = $id");
    }

    public function updateMerchant($id, $name)
    {
        return $this->db->execute("UPDATE merchants SET name = '$name' WHERE id = $id");
    }

    public function updateSize($id, $size)
    {
        return $this->db->execute("UPDATE shoe_size SET size = '$size' WHERE id = $id");
    }


    public function updateProduct($id, $image, $name, $price, $description, $category_id, $brand, $merchant)
    {
        return $this->db->execute("UPDATE product SET image = '$image', name = '$name', price = $price, description = '$description', category_id = $category_id, brand_id = $brand, merchant_id = $merchant WHERE id = $id");
    }

    public function addToProduct($image, $name, $price, $description, $category_id, $brand, $merchant, $size)
    {
        $resultSet = $this->db->execute("INSERT INTO product (image, name, price, description, category_id, brand_id, merchant_id, size_id) VALUES ('$image', '$name', $price, '$description', $category_id, $brand, $merchant, $size)");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito l\'oggetto nella wishlist');
        }
        return array('error' => '');
    }

    public function filteredByCategory($category)
    {
        $sql = "SELECT * FROM product WHERE category_id = $category";
        return $this->db->query($sql);
    }

    public function filteredByBrand($brand)
    {
        $sql = "SELECT * FROM product WHERE brand_id = $brand";
        return $this->db->query($sql);
    }

    public function filteredByPrice($price)
    {
        if ($price == 1) {
            $sql = "SELECT * FROM product ORDER BY price";
        } else {
            $sql = "SELECT * FROM product ORDER BY price DESC";
        }
        return $this->db->query($sql);
    }

    public function filteredByAll($category, $brand, $price)
    {
        $defaultQuery = "SELECT * FROM product WHERE 1=1 ";

        if($category !== "") {
            $defaultQuery .= " AND category_id = $category ";
        }

        if($brand !== "") {
            $defaultQuery .= " AND brand_id = $brand ";
        }

        if($price === "1" || $price === "2") {
            $defaultQuery .= " ORDER BY price " . ($price == 1 ? "" : "DESC");
        }

        return $this->db->query($defaultQuery);
    }

    public function getAllSize()
    {
        $sql = "SELECT * FROM shoe_size";
        return $this->db->query($sql);
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

    public function addSize($size)
    {
        $resultSet = $this->db->execute("INSERT INTO shoe_size (size) VALUES ('$size')");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito la Taglia');
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

    public function deleteMerchant($id)
    {
        $rowsDeleted = $this->db->delete_one("merchants", (int)$id);
        return (int) $rowsDeleted;
    }

    public function deleteSize($id)
    {
        $rowsDeleted = $this->db->delete_one("shoe_size", (int)$id);
        return (int) $rowsDeleted;
    }

    public function getBrandById($id)
    {
        $sql = "SELECT * FROM brand WHERE id = $id";
        return $this->db->query($sql);
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE id = $id";
        return $this->db->query($sql);
    }

    public function getMerchantById($id)
    {
        $sql = "SELECT * FROM merchants WHERE id = $id";
        return $this->db->query($sql);
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM product WHERE id = $id";
        return $this->db->query($sql);
    }

    public function getSizeById($id)
    {
        $sql = "SELECT * FROM shoe_size WHERE id = $id";
        return $this->db->query($sql);
    }
}
