<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

// in caso l'id non ci fosse reindirizza alla home page
if (!isset($_GET['id'])) {
    echo "<script>location.href='" . ROOT_URL . "';</script>";
    exit;
}

$pm = new ProductManager();
$pm2 = new ProductManager2();
$cm = new CartManager();
$errorMessage = null;
global $loggedInUser;

if (isset($_POST['add_to_cart'])) {

    $productId = htmlspecialchars(trim($_POST['id']));

    $cartId = $cm->getCurrentCartId();

    $cm->addToCart($productId, $cartId);
}

if (isset($_POST['add_to_wish_list'])) {
    $productId = htmlspecialchars(trim($_POST['id']));
    $addToWishlistOutcome = $pm->addToWishList($productId, $user->id);

    if (isset($addToWishlistOutcome)) {
        $errorMessage = $addToWishlistOutcome['error'];
    }
}

$id = htmlspecialchars(trim($_GET['id']));
$product = $pm2->getProduct($id)[0];
$sizes = explode(",", $product['size']);

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('view-product.html', [
    'product' => $product,
    'loggedInUser' => $loggedInUser,
    'sizes' => $sizes
]);