<?php 

$page = isset($_GET["page"]) ? $_GET["page"] : "products-list";
?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<div id = "main" class = "container" style = "margin-top:100px;"> 
    <div class = "row">
    
        <div class = "col-md-9 col-xs-12">
            <?php include ROOT_PATH . 'shop/pages/' . $page . '.php' ?>
        </div>

        <?php include ROOT_PATH . 'public/template-parts/sidebar.php' ?>

    </div>
</div>

<?php include ROOT_PATH . 'public/template-parts/footer.php' ?>