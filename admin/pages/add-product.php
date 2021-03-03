<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$errMsg = '';

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();
global $loggedInUser;

if (isset($_POST['add'])) {

    $image = htmlspecialchars(trim($_POST['image']));
    $name = htmlspecialchars(trim($_POST['name']));
    $price = htmlspecialchars(trim($_POST['price']));
    $description = htmlspecialchars(trim($_POST['description']));
    $category_id = htmlspecialchars(trim($_POST['category_id']));
    $merchant = htmlspecialchars(trim($_POST['merchant']));
    $brand = htmlspecialchars(trim($_POST['brand']));
    $merchant = htmlspecialchars(trim($_POST['merchant']));

    if ($image != '' && $name != '' && $category_id != '' && $category_id != '0' && $description != '' && $price != '' && $brand != '' && $brand != '0' && $merchant != '' && $merchant != '0') {

        $id = $productMgr2->addToProduct($image, $name, $price, $description, $category_id, $brand, $merchant);

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=products-list&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}

$categorys = $productMgr->getAllCategory();
$brands = $productMgr->getAllBrand();
$merchants = $productMgr->getAllMerchant();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('add-product.html', [
    'categorys' => $categorys,
    'brands' => $brands,
    'merchants' => $merchants,
    'errMsg' => $errMsg
]);