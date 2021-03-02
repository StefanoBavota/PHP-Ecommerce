<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

if (!$loggedInUser) {
    echo "<script>location.href='" . ROOT_URL . "auth?page=login&msg=login_for_checkout';</script>";
    exit;
}

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

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('checkout.html', []);