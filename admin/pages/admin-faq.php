<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

require_once('../vendor/autoload.php');

$errMsg = '';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

$userMgr = new UserManager2();

if (isset($_POST['update'])) {

    $title = htmlspecialchars(trim($_POST['title']));
    $text = htmlspecialchars(trim($_POST['text']));

    if ($title != '' && $text != '') {
        $faq = $userMgr->addToFaq($title, $text);

        if ($faq > 0) {
            echo '<script>location.href="' . ROOT_URL . 'shop"</script>';
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        echo $errMsg = "Compila tutti i campi";
    }
}

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, []);

echo $twig->render('admin-faq.html', [
    'errMsg' => $errMsg
]);