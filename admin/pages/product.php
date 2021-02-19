<?php

    //evitare manipolazioni
    if (!defined('ROOT_URL')){
        die;
    }

    $productMgr = new ProductManager();

    if (isset($_POST['add_product'])) {

        $image = htmlspecialchars(trim($_POST['image']));
        $name = htmlspecialchars(trim($_POST['name']));
        $price = htmlspecialchars(trim($_POST['price']));
        $description = htmlspecialchars(trim($_POST['description']));
        $category_id = htmlspecialchars(trim($_POST['category_id']));
        
        $productMgr = new ProductManager();
        $result = $productMgr->insert($image, $name, $price, $description, $category_id);
    }
?>

<h2>Aggiungi Prodotto</h2>

<form method="post">

        <div class="form-group">
            <label for="image">Immagine</label>
            <input name="image" id="image" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Nome prodotto</label>
            <input name="name" id="name" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input name="price" id="price" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input name="description" id="description" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <input name="category_id" id="category_id" type="text" class="form-control">
        </div>

    <button class="btn btn-primary" type="submit" name="add_product">Aggiungi</button>
</form>