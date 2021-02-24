<?php

$page = isset($_GET["page"]) ? $_GET["page"] : "dashboard";
?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<div id="main" class="container" style="margin-top:100px;">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <?php include ROOT_PATH . 'admin/pages/' . $page . '.php' ?>
        </div>

        <?php if ($page == 'products-list') : ?>
            <?php include ROOT_PATH . 'admin/pages/sidebar.php' ?>
        <?php endif; ?>

    </div>
</div>

<?php include ROOT_PATH . 'public/template-parts/footer.php' ?>