<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

if (!$loggedInUser) {
    echo "<script>location.href='" . ROOT_URL . "auth?page=login&msg=login_for_checkout';</script>";
    exit;
}

global $loggedInUser;

$userId = $loggedInUser->id;
$orderMgr = new OrderManager();
$status = 'pending';
$pendingOrders = $orderMgr->getOrdersOfUser($userId, 'pending');
$status = 'shipped';
$shippedOrders = $orderMgr->getOrdersOfUser($userId, $status);
$points = $orderMgr->totalInPoints($userId);

$count = 0;

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('my-orders.html', [
    'count' => $count,
    'points' => $points,
    'pendingOrders' => $pendingOrders
]);