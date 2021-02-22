<?php
// Prevent from direct access
if (!defined('ROOT_URL')) {
    die;
}

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
?>

<h1>Elenco Risposte</h1>

<?php if (count($message) > 0) : ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="big-screen">Risposta</th>
                <th scope="col" class="right">Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($message as $msg) : ?>
                <tr>
                    <td class="big-screen"><?php echo $msg['msg']; ?></td>
                    <td>
                        <form method="post" class="right">
                            <input type="hidden" name="id" value="<?php echo $msg['id']; ?>">
                            <input name="delete" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-outline-danger btn-sm" value="Elimina">
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Nessun Messaggio presente...</p>
<?php endif; ?>

<h1>Richidi assistenza</h1>
<a href="<?php echo ROOT_URL; ?>public?page=contacts" class="btn btn-primary btn-lg mb-5 mt-3">Contattaci</a>