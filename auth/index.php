<?php 

$page = isset($_GET["page"]) ? $_GET["page"] : "login";
?>

<?php include '../inc/init.php' ?>
<?php include ROOT_PATH . 'public/template-parts/header.php' ?>

<div id = "main" class = "container" style = "margin-top:100px;"> 
    <div class = "row">
    
        <div class="col-md-7 col-lg-8 ml-4 mr-4">
            <?php include ROOT_PATH . 'auth/pages/' . $page . '.php' ?>
        </div>

        <?php include ROOT_PATH . 'public/template-parts/sidebar.php' ?>

    </div>
</div>

<?php include ROOT_PATH . 'public/template-parts/footer.php' ?>