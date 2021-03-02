<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$cm = new CartManager();
$cm2 = new CartItemManager();
$cartId = $cm->getCurrentCartId();
global $loggedInUser;

if (isset($_POST['minus'])) {
    // rimuovo dal carrello
    $productId = htmlspecialchars(trim($_POST['id']));
    $cm->removeFromCart($productId, $cartId);
}

if (isset($_POST['plus'])) {
    // aggiungo dal carrello
    $productId = htmlspecialchars(trim($_POST['id']));
    $cm->addToCart($productId, $cartId);
}

$cart_total = $cm->getCartTotal($cartId);
$cart_items = $cm->getCartItems($cartId);
$payments = $cm2->getAllPayment();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('cart.html', [
    'cart_total' => $cart_total,
    'cart_items' => $cart_items,
    'payments' => $payments,
    'loggedInUser' => $loggedInUser
]);
