<?php

$page = isset($_GET["page"]) ? $_GET["page"] : "products-list";

?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<div class="row banner"></div>

<div id="main" class="container-fluid" style="margin-top:150px;">
    <div class="row">

        <div class="col-md-9 col-xs-12">
            <?php include ROOT_PATH . 'shop/pages/' . $page . '.php' ?>
        </div>

        <?php include ROOT_PATH . 'public/template-parts/sidebar.php' ?>

    </div>
</div>

<?php include ROOT_PATH . 'public/template-parts/footer.php' ?>