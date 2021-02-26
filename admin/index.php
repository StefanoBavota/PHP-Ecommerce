<?php

$page = isset($_GET["page"]) ? $_GET["page"] : "dashboard";
?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<div id="main" class="container" style="margin-top:100px;">
    <div class="row">

        <?php if ($loggedInUser && $loggedInUser->is_admin && !$page == 'products-list') : ?>
            <div class="col-10 col-xs-12">
                <?php include ROOT_PATH . 'admin/pages/' . $page . '.php' ?>
            </div>
        <?php else : ?>
            <div class="col-md-9 col-xs-12">
                <?php include ROOT_PATH . 'admin/pages/' . $page . '.php' ?>
            </div>
        <?php endif; ?>

        <?php if ($page == 'products-list') : ?>
            <?php include ROOT_PATH . 'admin/pages/sidebar.php' ?>
        <?php endif; ?>

    </div>
</div>

<?php include ROOT_PATH . 'public/template-parts/footer.php' ?>