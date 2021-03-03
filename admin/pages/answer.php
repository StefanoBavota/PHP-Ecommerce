<?php

if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$messageId = $_GET['id'];
$messageService = new UserManager();
$msge = $messageService->getMessage($messageId)[0];

if (isset($_POST['answer'])) {

    $msg = htmlspecialchars(trim($_POST['msg']));


    $id = $messageService->addToAnswer($msg, $user->id, $msge['user_id']);

    if ($id > 0) {
        echo "<script>location.href='" . ROOT_URL . "admin?page=users-list&msg=updated';</script>";
        exit;
    } else {
        $alertMsg = 'err';
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('answer.html', [
    'user' => $user
]);