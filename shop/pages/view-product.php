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

    // ($product_id, $user->id) -> DB ( wish_list )
    $addToWishlistOutcome = $pm->addToWishList($productId, $user->id);

    if (isset($addToWishlistOutcome)) {
        $errorMessage = $addToWishlistOutcome['error'];
    }
}

$id = htmlspecialchars(trim($_GET['id']));
$product = $pm->get($id);
$sizes = $pm2->getAllSize();

// in caso l'id fosse errato reindirizza alla home page
if (!(property_exists($product, 'id'))) {
    echo "<script>location.href='" . ROOT_URL . "';</script>";
    exit;
}

$array = array("41", "42", "43");

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('view-product.html', [
    'product' => $product,
    'loggedInUser' => $loggedInUser,
    'sizes' => $sizes,
    'array' => $array
]);