<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

if (!$loggedInUser) {
    echo "<script>location.href='" . ROOT_URL . "auth?page=login&msg=login_for_checkout';</script>";
    exit;
}
?>

<?php
global $alertMsg;
$error = false;

$cartMgr = new CartManager();
$orderMgr = new OrderManager();

$cartId = $cartMgr->getCurrentCartId();

if ($cartMgr->isEmptyCart($cartId)) {
    $alertMsg = 'cart_empty';
    $error = true;
}

$address = $orderMgr->getUserAddress($loggedInUser->id);
if (!$error && !$address) {
    $alertMsg = 'address_not_found';
    $error = true;
}

if (!$error) {
    $orderId = $orderMgr->createOrderFromCart($cartId, $loggedInUser->id);
    $orderMgr->addToPoints($loggedInUser->id);

    $orderItems = $orderMgr->getOrderItems($orderId);
    $orderTotal = $orderMgr->getOrderTotal($orderId)[0];
} else {
    echo "<script>location.href='" . ROOT_URL . "shop?page=cart&msg=$alertMsg';</script>";
    exit;
}

?>

<h1>Grazie per aver effettuato l'acquisto</h1>
<p class="lead">Hai gudagnato 5 punti!</p>
<br>

<a class="back underline" href="<?php echo ROOT_URL; ?>">&laquo; Torna alla Home</a>
