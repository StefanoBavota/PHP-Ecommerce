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

if (isset($_POST['add_to_cart'])) {

    $productId = htmlspecialchars(trim($_POST['id']));
    $wishId = htmlspecialchars(trim($_POST['id_wish']));
    $productMgr->delete_wish($wishId);

    $cm = new CartManager();
    $cartId = $cm->getCurrentCartId();

    $cm->addToCart($productId, $cartId);
}

if (isset($_POST['remove'])) {
    $productId = htmlspecialchars(trim($_POST['id']));
    $productMgr->delete_wish($productId);
}

if (isset($user)) {
    $wishlist = $productMgr->getCurrentUserWishlist($user->id);
    $productsCount = $productMgr->countCurrentUserWishlistProductsAmount($user->id)[0]['amount'];
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [ ]);

echo $twig->render('wish-list.html', ['wishlist' => $wishlist]);
?>