<?php

if (!defined('ROOT_URL')) {
    die;
}

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

?>

<div class="mt-5 mb-4">
    <a href="<?php echo ROOT_URL . 'admin?page=users-list'; ?>" class="back underline scuro">&laquo; Lista Messaggi</a>
</div>

<h1>Rispondi al Messaggio</h1>

<form method="post" class="mt-5">
    <div class="form-group">
        <label for="msg">Risposta</label>
        <textarea rows="7" name="msg" id="msg" type="text" class="form-control"></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo esc_html($user->id); ?>">
    <input name="answer" type="submit" class="btn btn-primary" value="Rispondi">
</form>