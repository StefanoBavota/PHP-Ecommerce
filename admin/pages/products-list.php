<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

global $alertMsg;
$productMgr = new ProductManager();

if (isset($_POST['remove'])) {
    // rimuovo prodotto dal db
    $productId = htmlspecialchars(trim($_POST['id']));
    $productMgr->delete($productId);
    $alertMsg = 'deleted';
}

$products = $productMgr->getAll();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('product-list-admin.html', [
    'products' => $products,
    'alertMsg' => $alertMsg
]);