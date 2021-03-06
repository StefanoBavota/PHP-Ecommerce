<?php
//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$errMsg = '';

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();
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

if (isset($_POST['delete3'])) {
    $id = trim($_POST['id']);
    $productMgr->deleteSize($id);
}

$allBrand = $productMgr->getAllBrand();
$allCategory = $productMgr->getAllCategory();
$allMerchant = $productMgr->getAllMerchant();
$allSize = $productMgr2->getAllSize();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('others-list.html', [
    'allBrand' => $allBrand,
    'allCategory' => $allCategory,
    'allMerchant' => $allMerchant,
    'allSize' => $allSize,
    'errMsg' => $errMsg
]);