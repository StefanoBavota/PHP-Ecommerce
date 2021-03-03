<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$errMsg = '';

$productMgr = new ProductManager();
$cartMgr = new CartItemManager();
global $loggedInUser;

if (isset($_POST['add1'])) {

    $brand = htmlspecialchars(trim($_POST['brand']));

    $id = $productMgr->addBrand($brand);

    if ($brand != '') {

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=add-others&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}
if (isset($_POST['add2'])) {

    $category = htmlspecialchars(trim($_POST['category']));

    $id = $productMgr->addCategory($category);

    if ($category != '') {

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=add-others&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}
if (isset($_POST['add4'])) {

    $merchant = htmlspecialchars(trim($_POST['merchant']));

    $id = $productMgr->addMerchant($merchant);

    if ($merchant != '') {

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=add-others&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('add-others.html', [
    'errMsg' => $errMsg
]);