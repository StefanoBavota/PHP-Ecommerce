<?php

$errMsg = '';

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

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
            echo '<script>location.href="' . ROOT_URL . 'public"</script>';
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        echo $errMsg = "Compila tutti i campi";
    }
}

?>

<h1>Crea FAQ</h1>

<form method="post" class="mt-4">
    <div class="form-group">
        <label for="title">Titolo</label>
        <input name="title" id="title" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="text">Testo</label>
        <textarea rows="7" name="text" id="text" type="text" class="form-control"></textarea>
    </div>
    <input name="update" type="submit" class="btn btn-primary mb-4" value="Crea FAQ">
</form>