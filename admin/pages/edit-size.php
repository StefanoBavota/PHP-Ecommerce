<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();

if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $size = $productMgr->getSizeById($id)[0];
}

// Submit update
if (isset($_POST['update'])) {

    $size = esc($_POST['size']);

    $res = $productMgr2->updateSize($id, $size);

    if (($res) > 0) {
        echo "<script>location.href='" . ROOT_URL . "admin/?page=others-list';</script>";
        exit;
    } else {
        $alertMsg = 'err';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('edit-size.html', [
    'size' => $size
]);
