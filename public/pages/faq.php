<?php

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

global $alertMsg;
$mgr = new UserManager2();

if (isset($_POST['remove'])) {
    $id = trim($_POST['id']);
    $mgr->deleteFaq($id);
}

$faqs = $mgr->getFaq();
?>

<h1>Domande più frequenti</h1>

<div class="mt-5">
    <?php if ($faqs) : ?>
        <?php foreach ($faqs as $faq) : ?>

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="heading<?php echo $faq['id']; ?>">

                        <h5 class="mb-0"></h5>

                        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapse<?php echo $faq['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $faq['id']; ?>"><?php echo $faq['title'] ?></button>

                        <?php if ($loggedInUser && $loggedInUser->is_admin) : ?>

                            <a class="btn btn-outline-secondary btn-sm left ml-auto" style="float: right;" href="<?php echo ROOT_URL . 'admin?page=edit-faq'; ?>&id=<?php echo $faq['id']; ?>">Modifica</a>
                            <form method="post" class="right">
                                <input type="hidden" name="id" value="<?php echo $faq['id']; ?>">
                                <input name="remove" onclick="return confirm('Procedere ad eliminare?');" type="submit" class="btn btn-danger btn-sm rounded-0" value="Elimina" style="float: right;">
                            </form>

                        <?php endif; ?>
                    </div>

                    <div id="collapse<?php echo $faq['id']; ?>" class="collapse" aria-labelledby="heading<?php echo $faq['id']; ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php echo $faq['text'] ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else : ?>
        <p>Nessuna FAQ presente</p>
    <?php endif; ?>
</div>