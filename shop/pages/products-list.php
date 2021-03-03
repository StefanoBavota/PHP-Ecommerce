<?php
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();
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

if (isset($_POST['filter'])){
    if ($_POST['category'] !== ""){
        $products = $productMgr2->filteredByCategory($_POST['category']);
    }

    if ($_POST['brand'] !== ""){
        $products = $productMgr2->filteredByBrand($_POST['brand']);
    }

    if ($_POST['price'] !== ""){
        $products = $productMgr2->filteredByPrice($_POST['price']);
    }

    $products = $productMgr2->filteredByAll($_POST['category'], $_POST['brand'], $_POST['price']);
}

$categories = $productMgr->getAllCategory();
$brands = $productMgr->getAllBrand();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('products-list.html', [
    'products' => $products,
    'categories' => $categories,
    'brands' => $brands
]);
