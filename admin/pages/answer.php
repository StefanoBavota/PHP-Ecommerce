<?php

if (!defined('ROOT_URL')) {
    die;
}


$messageId = $_GET['id'];

$messageService = new UserManager();

$msg = $messageService->getMessage($messageId)[0];

die(mail('cristianobombardo@hotmail.it',"lorem ipsump" ," solro sit amet"));
?>

<a href="<?php echo ROOT_URL . 'admin?page=users-list'; ?>" class="back underline">&laquo; Lista Messaggi</a>

<h1>Rispondi al Messaggio</h1>

<form method="post" class="mt-5">
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" type="text" class="form-control" value="<?php echo $msg['email']; ?>">
    </div>
    <div class="form-group">
        <label for="msge">Descrizione</label>
        <textarea rows="7" name="msge" id="msge" type="text" class="form-control"></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo esc_html($user->id); ?>">
    <input name="answer" type="submit" class="btn btn-primary" value="Rispondi">
</form>