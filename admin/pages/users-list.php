<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

global $alertMsg;
$userMgr = new UserManager();
if (isset($_POST['delete'])) {
    $id = trim($_POST['id']);
    $userMgr->delete($id);
}

if (isset($_POST['remove'])) {
    $id = trim($_POST['id']);
    $userMgr->deleteMessage($id);
}

$users = $userMgr->getAll();
$message = $userMgr->getCurrentContactUs();

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('users-list.html', [
    'users' => $users,
    'message' => $message,
    'alertMsg' => $alertMsg
]);