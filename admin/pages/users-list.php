<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

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

?>

<h1>Elenco Utenti</h1>

<?php if (count($users) > 0) : ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="big-screen">Nominativo</th>
                <th scope="col">Email</th>
                <th scope="col" class="big-screen">Tipo Utente</th>
                <th scope="col" class="right">Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td class="big-screen"><?php echo esc_html($user->nome) . ' ' . esc_html($user->cognome); ?></td>
                    <td><?php echo esc_html($user->email); ?></td>
                    <td class="big-screen"><?php if ($user->user_type_id == '1') echo "Amministratore"; else echo "utente"; ?></td>
                    <td>
                        <a class="btn btn-outline-secondary btn-sm left" href="<?php echo ROOT_URL . 'admin?page=user'; ?>&id=<?php echo esc_html($user->id); ?>">Modifica</a>
                        <form method="post" class="right">
                            <input type="hidden" name="id" value="<?php echo esc_html($user->id); ?>">
                            <input name="delete" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-outline-danger btn-sm" value="Elimina">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Nessun Utente presente...</p>
<?php endif; ?>

<h1>Messaggi</h1>

<?php if (count($message) > 0) : ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="big-screen">Nominativo</th>
                <th scope="col">Email</th>
                <th scope="col" class="big-screen">Messaggio</th>
                <th scope="col" class="right">Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($message as $msg) : ?>
                <tr>
                    <td class="big-screen"><?php echo $msg['nome'] . ' ' . $msg['cognome']; ?></td>
                    <td><?php echo $msg['email']; ?></td>
                    <td class="big-screen"><?php echo $msg['msg']; ?></td>
                    <td>
                        <a class="btn btn-outline-secondary btn-sm left" href="<?php echo ROOT_URL . 'admin?page=answer'; ?>&id=<?php echo $msg['msg_id']; ?>">Rispondi</a>
                        <form method="post" class="right">
                            <input type="hidden" name="id" value="<?php echo $msg['msg_id']; ?>">
                            <input name="remove" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-outline-danger btn-sm" value="Elimina">
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Nessun Messaggio presente...</p>
<?php endif; ?>