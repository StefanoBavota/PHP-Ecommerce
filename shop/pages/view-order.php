<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

require_once ('../vendor/autoload.php');

if (!$loggedInUser) {
    echo "<script>location.href='" . ROOT_URL . "auth?page=login';</script>";
    exit;
}


if (!isset($_GET['id'])) {
    echo "<script>location.href='" . ROOT_URL . "admin?page=orders-list&msg=not_found';</script>";
    exit;
}

$orderId = esc($_GET['id']);

$orderMgr = new OrderManager();
$orderItems = $orderMgr->getOrderItems($orderId);
$orderTotal = $orderMgr->getOrderTotal($orderId)[0];

$status = $orderItems[0]['order_status'];

//var_dump($orderTotal);die;
if (count($orderItems) == 0) {
    echo "<script>location.href='" . ROOT_URL . "admin?page=orders-list&msg=order_empty';</script>";
    exit;
}
$count = 0;

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [ ]);

echo $twig->render('view-order.html', [
    'orderItems' => $orderItems,
    'orderTotal' => $orderTotal,
    'count' => $count
]);

?>

