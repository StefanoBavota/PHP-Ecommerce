<?php
require_once '../vendor/autoload.php';

$page = isset($_GET["page"]) ? $_GET["page"] : "products-list";
?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<?php if ($page == 'products-list') : ?>
    <div class="row banner"></div>
<?php endif; ?>

<div id="main" class="container-fluid" style="margin-top:50px;">
    <div class="row">

        <?php if ($loggedInUser) : ?>
            <div class="col-md-9 col-xs-12">
                <?php include ROOT_PATH . 'shop/pages/' . $page . '.php' ?>
            </div>

            <?php if ($page !== 'wish-list') : ?>
                <?php include ROOT_PATH . 'public/template-parts/sidebar.php' ?>
            <?php endif; ?>
        <?php else : ?>
            <?php if ($page == 'view-product') : ?>
                <div class="col-md-9 col-xs-12">
                    <?php include ROOT_PATH . 'shop/pages/' . $page . '.php' ?>
                </div>
            <?php endif; ?>

            <div class="col-md-12 col-xs-12">
                    <?php include ROOT_PATH . 'shop/pages/' . $page . '.php' ?>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php include ROOT_PATH . 'public/template-parts/footer.php' ?>