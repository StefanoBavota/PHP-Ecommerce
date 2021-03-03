<?php
//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();

global $alertMsg;

if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $product = $productMgr->getProductById($id)[0];
    $categoryId = $productMgr->getCategoryById($product['category_id'])[0];
    $brandId = $productMgr->getBrandById($product['brand_id'])[0];
    $merchantId = $productMgr->getMerchantById($product['merchant_id'])[0];
}

if (isset($_POST['update'])) {

    $id = htmlspecialchars(trim($_POST['id']));
    $image = htmlspecialchars(trim($_POST['image']));
    $name = htmlspecialchars(trim($_POST['name']));
    $price = htmlspecialchars(trim($_POST['price']));
    $description = htmlspecialchars(trim($_POST['description']));
    $category_id = htmlspecialchars(trim($_POST['category_id']));
    $brand = htmlspecialchars(trim($_POST['brand']));
    $merchant = htmlspecialchars(trim($_POST['merchant']));

    if ($image != '' && $name != '' && $description != '' && $price != '') {

        $res = $productMgr2->updateProduct($id, $image, $name, $price, $description, $category_id, $brand, $merchant);

        if ($res > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=products-list&msg=updated';</script>";
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

echo $twig->render('edit-product.html', [
    'categorys' => $categorys,
    'brands' => $brands,
    'merchants' => $merchants,
    'alertMsg' => $alertMsg
]);
