<?php
//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

global $alertMsg;
$productMgr = new ProductManager();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

if (isset($_POST['remove'])) {
    // rimuovo prodotto dal db
    $productId = htmlspecialchars(trim($_POST['id']));
    $productMgr->delete_wish($productId);
}

if (isset($user)) {
    $wishlist = $productMgr->getCurrentUserWishlist($user->id);
    $productsCount = $productMgr->countCurrentUserWishlistProductsAmount($user->id)[0]['amount'];
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('sidebar.html', [
    'wishlist' => $wishlist,
    'productsCount' => $productsCount,
    'user' => $user
]);
