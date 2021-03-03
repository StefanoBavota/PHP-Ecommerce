<?php
//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$errMsg = '';

$productMgr = new ProductManager();
$cartMgr = new CartItemManager();

if (isset($_POST['delete1'])) {
    $id = trim($_POST['id']);
    $productMgr->deleteBrand($id);
}

if (isset($_POST['delete2'])) {
    $id = trim($_POST['id']);
    $productMgr->deleteCategory($id);
}

if (isset($_POST['delete4'])) {
    $id = trim($_POST['id']);
    $productMgr->deleteMerchant($id);
}

$allBrand = $productMgr->getAllBrand();
$allCategory = $productMgr->getAllCategory();
$allMerchant = $productMgr->getAllMerchant();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('others-list.html', [
    'allBrand' => $allBrand,
    'allCategory' => $allCategory,
    'allMerchant' => $allMerchant,
    'errMsg' => $errMsg
]);