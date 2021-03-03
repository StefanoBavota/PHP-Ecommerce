<?php

require_once('../vendor/autoload.php');

$cm = new CartManager();
$cartId = $cm->getCurrentCartId();

$cart_total = $cm->getCartTotal($cartId);

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('footer.html', [
    'cartId' => $cartId,
    'cart_total' => $cart_total
]);