<?php

class Cart
{

    public $id;
    public $user_id;
    public $client_id;

    public function __construct($id, $user_id, $client_id)
    {
        $this->id = $id > 0 ? $id : 0;
        $this->user_id = $user_id;
        $this->client_id = $client_id;
    }
}

class CartItem
{

    public $id;
    public $cart_id;
    public $product_id;
    public $quantity;

    public function __construct($id, $cart_id, $product_id, $quantity)
    {
        $this->id = $id > 0 ? $id : 0;
        $this->cart_id = $cart_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }
}

class Order
{

    public $id;
    public $user_id;
    public $status;

    public function __construct($user_id, $status)
    {
        $this->user_id = $user_id;
        $this->status = $status;
    }
}

class CartItemManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->columns = array('id', 'cart_id', 'product_id', 'quantity');
        $this->tableName = 'cart_item';
    }

}

class OrderManager extends DBManager
{
    public function __construct()
    {
        parent::__construct();
        $this->columns = array('id', 'user_id', 'status');
        $this->tableName = 'Orders';
    }

    public function updateStatus($orderId, $status)
    {
        $query = "UPDATE orders SET status = '$status', updated_at = CURRENT_TIMESTAMP() WHERE id = $orderId";
        $result = $this->db->query($query);
        return $result;
    }

    public function addToPoints($userId)
    {
        $total = $this->totalInPoints($userId);
        $this->incrementTotal($total, $userId);
    }

    public function totalInPoints($userId)
    {
        //$total = 0;
        $results = $this->db->query("SELECT total FROM points WHERE user_id = $userId");
        if (count($results) > 0) {
            $total = (int)$results[0]['total'];
        } else {
            $total = 0;
        }
        return $total;
    }

    private function incrementTotal($total, $userId)
    {
        $total = $total + 5;
        $this->db->execute("UPDATE points SET total = $total WHERE user_id = $userId");
    }

    public function getOrdersOfUser($userId, $status)
    {
        $query = "SELECT 
            o.id as order_id
                ,o.created_at as created_date
                ,o.updated_at as shipped_date
                ,o.status as status
            FROM orders o
        WHERE
            o.user_id = $userId AND status = '$status' 
                AND (status is NULL OR status = o.status)
            ORDER BY
            o.created_at DESC;";

        //var_dump($query); die;
        $result = $this->db->query($query);
        //var_dump($result); die;
        return $result;
    }

    public function getEmailAndName($orderId)
    {
        $result = $this->db->query("SELECT u.email, u.first_name
            FROM orders as o
            INNER JOIN user as u
            ON o.user_id = u.id
        WHERE 
            o.id = $orderId;");
        //var_dump($result); die;
        return $result[0];
    }

    public function createOrderFromCart($cartId, $userId)
    {
        $orderId = $this->create(new Order($userId, 'pending'));

        $sql = "INSERT INTO order_items (order_id, product_id, quantity) SELECT $orderId, ci.product_id, ci.quantity
            FROM cart c
            INNER JOIN cart_item ci
            ON c.id = ci.cart_id
        WHERE
            c.id = $cartId;

        DELETE cart, cart_item
            FROM cart
            INNER JOIN cart_item
            ON cart.id = cart_item.cart_id
        WHERE
            cart.id = $cartId;";

        $this->db->execute($sql);
        return $orderId;
    }

    public function getOrderTotal($orderId)
    {
        $result = $this->db->query("SELECT 
        o.id as order_id
        , o.user_id as user_id
          , SUM(ifnull(oi.quantity, 0)) as num_products
          , SUM(ifnull(oi.quantity, 0) * ifnull(p.price, 0)) as total
       FROM 
        orders as o
        INNER JOIN order_items as oi
          ON o.id = oi.order_id
        INNER JOIN product as p
          ON oi.product_id = p.id
        WHERE
          $orderId = o.id;");
        //var_dump($result); die;
        return $result;
    }

    public function getOrderItems($orderId)
    {
        $result = $this->db->query(" SELECT 
        o.id as order_id
            , o.status as order_status
            , oi.id as order_item_id
            , p.name as product_name
            , p.id as product_id
            , p.description as product_description
            , ifnull(oi.quantity, 0) as quantity
            , ifnull(p.price, 0) as single_price
            , ifnull(oi.quantity,0) * ifnull(p.price, 0) as total_price
        FROM
        orders as o
            INNER JOIN order_items as oi
          ON o.id = oi.order_id
            INNER JOIN product as p
          ON p.id = oi.product_id
         WHERE
        ifnull($orderId, 0) = 0
            OR $orderId = o.id;");
        return $result;
    }

    public function getUserAddress($userId)
    {
        $result = $this->db->query("SELECT street, city, cap FROM address WHERE user_id = $userId");
        //var_dump($result); die;
        return $result ? $result[0] : null;
    }

    public function getAllOrders($status)
    {
        $result = $this->db->query("SELECT 
            o.id as order_id
                , o.created_at as created_date
                , o.updated_at as shipped_date
                , o.status as status
                , o.user_id as user_id
                , u.email as user_descr
            FROM orders o
            INNER JOIN user u
            ON o.user_id = u.id
        WHERE
                ($status is NULL OR $status = o.status)
            ORDER BY
            o.created_at DESC;");
        //var_dump($result); die;
        return $result;
    }
}



class CartManager extends DBManager
{

    private $userId;
    private $clientId;
    private $cartItemMgr;

    public function __construct()
    {
        parent::__construct();
        $this->columns = array('id', 'client_id');
        $this->tableName = 'cart';
        $this->cartItemMgr = new CartItemManager();
        $this->_initializeClientIdFromSession();
    }

    private function quantityInCart($productId, $cartId)
    {
        $quantity = 0;
        $results = $this->db->query("SELECT quantity FROM cart_item WHERE cart_id = '$cartId' AND product_id = '$productId'");
        if (count($results) > 0) {
            $quantity = (int)$results[0]['quantity'];
        }
        return $quantity;
    }

    private function _initializeClientIdFromSession()
    {
        if (isset($_SESSION['client_id'])) {
            $this->clientId = $_SESSION['client_id'];
        } else {
            // generare una stringa casuale
            $str = $this->_random_string();
            // settare clientId in sessione con questa stringa
            $_SESSION['client_id'] = $str;
            $this->clientId = $str;
        }
    }

    private function _random_string()
    {
        return substr(md5(mt_rand()), 0, 20);
    }

    private function incrementByOne($productId, $cartId, $quantityInCart)
    {
        $quantityInCart++;
        $this->db->execute("UPDATE cart_item SET quantity = $quantityInCart WHERE cart_id = '$cartId' AND product_id = '$productId'");
    }

    private function decrementOne($productId, $cartId, $quantityInCart)
    {
        $quantityInCart--;
        $this->db->execute("UPDATE cart_item SET quantity = $quantityInCart WHERE cart_id = '$cartId' AND product_id = '$productId'");
    }

    private function createItem($productId, $cartId)
    {
        $item_id = $this->cartItemMgr->create(new CartItem(0, $cartId, $productId, 1));
        return $item_id;
    }

    public function isEmptyCart($cartId)
    {
        $results = $this->db->query("SELECT 1 FROM cart_item WHERE cart_id = '$cartId'");
        return count($results) == 0;
    }

    private function createCart()
    {

        $client_id = $this->userId > 0 ? '' : $this->clientId;
        $cart_id = $this->create(new Cart(0, $this->userId, $client_id));
        return $cart_id;
    }

    private function removeItem($productId, $cartId)
    {
        return $this->db->execute("DELETE FROM cart_item WHERE cart_id = '$cartId' AND product_id = '$productId'");
    } 

    public function clearUserCart($userId)
    {
        $this->db->execute("DELETE FROM cart WHERE client_id = '$userId'");
    }

    public function addToCart($productId, $cartId)
    {
        $quantityInCart = $this->quantityInCart($productId, $cartId);

        if ($quantityInCart > 0) {
            $this->incrementByOne($productId, $cartId, $quantityInCart);
        } else {
            $this->createItem($productId, $cartId);
        }
    }

    public function removeFromCart($productId, $cartId)
    {

        $quantityInCart = $this->quantityInCart($productId, $cartId);

        if ($quantityInCart > 1) {
            $this->decrementOne($productId, $cartId, $quantityInCart);
        } else {
            $this->removeItem($productId, $cartId);
        }
    }

    public function getCurrentCartId()
    {
        $cartId = 0;

        $result = $this->db->query("SELECT * FROM cart WHERE client_id = '$this->clientId'");
        if (count($result) > 0) {
            $cartId = $result[0]['id'];
        } else {
            $cartId = $this->create([
                'client_id' => $this->clientId
            ]);
        }

        return $cartId;
    }

    public function getCartTotal($cartId)
    {
        $result = $this->db->query("
       SELECT 
          SUM(quantity) as num_products
          , SUM(quantity* price) as total
        FROM cart_item
        INNER JOIN product
          ON cart_item.product_id = product.id
        WHERE cart_id = $cartId
        ");
        return $result[0];
    }

    public function getCartItems($cartId)
    {
        return $this->db->query("
        SELECT
          product.name AS name
          , product.description AS description
          , product.price AS single_price
          , cart_item.quantity AS quantity
          , product.price * cart_item.quantity AS total_price
          , product.id as id
        FROM
          cart_item 
          INNER JOIN product 
          ON cart_item.product_id = product.id
        WHERE
          cart_item.cart_id = $cartId
        ");
    }
}
