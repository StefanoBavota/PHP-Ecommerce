<?php
if (!defined('ROOT_URL')) {
    die;
}

require_once ('../vendor/autoload.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$productMgr = new ProductManager();
$products = $productMgr->getAll();
$errorMessage = null;
if (isset($_POST['add_to_wish_list'])) {
    $productId = htmlspecialchars(trim($_POST['id']));

    $addToWishlistOutcome = $productMgr->addToWishList($productId, $user->id);

    if (isset($addToWishlistOutcome)) {
        $errorMessage = $addToWishlistOutcome['error'];
    }
}

if (isset($_POST['add_to_cart'])) {
    $productId = htmlspecialchars(trim($_POST['id']));

    $cm = new CartManager();
    $cartId = $cm->getCurrentCartId();

    $cm->addToCart($productId, $cartId);
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [ ]);

echo $twig->render('products-list.html', ['products' => $products]);
