<?php
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

global $alertMsg;
$userMgr = new UserManager();

if (isset($_POST['delete'])) {
    $id = trim($_POST['id']);
    $userMgr->deleteAnswer($id);
}

$message = $userMgr->getCurrentUserAnswer($user->id);

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('message-list.html', [
    'message' => $message
]);
