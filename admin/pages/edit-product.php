<?php
    $errMsg = '';

    //evitare manipolazioni
    if (!defined('ROOT_URL')){
        die;
    }

    $productMgr = new ProductManager();
    $product = new Product(0, '', '', 0, '', 0);

    if (isset($_GET['id'])) {

        $id = trim($_GET['id']);
        $product = $productMgr->get($id);
    }

    if (isset($_POST['update'])) {

        $image = htmlspecialchars(trim($_POST['image']));
        $name = htmlspecialchars(trim($_POST['name']));
        $price = htmlspecialchars(trim($_POST['price']));
        $description = htmlspecialchars(trim($_POST['description']));
        $category_id = htmlspecialchars(trim($_POST['category_id']));
        $id = htmlspecialchars(trim($_POST['id']));
      
        if ($id != '' && $id != '0' && $name != '' && $category_id != '' && $category_id != '0' && $description != '' && $price != '') {
        
            $numUpdated = $productMgr->update(new Product($id, $image, $name, $price, $description, $category_id), $id);
        
            if ($numUpdated > 0) {
                echo "<script>location.href='".ROOT_URL."admin?page=products-list&msg=updated';</script>";
                exit;
            } else {
                $alertMsg = 'err';
            }
        } else {
            $alertMsg = 'mandatory_fields';
        }
    }
?>

<h2>Modifica Prodotto</h2>

<form method="post">

    <div class="form-group">
        <label for="image">Immagine</label>
        <input name="image" id="image" type="text" class="form-control" value="<?php echo esc_html($product->image); ?>">
    </div>

    <div class="form-group">
        <label for="name">Nome prodotto</label>
        <input name="name" id="name" type="text" class="form-control" value="<?php echo esc_html($product->name); ?>">
    </div>

    <div class="form-group">
    <label for="price">Prezzo</label>
        <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">€</span>
            </div>
            <input type="text" class="form-control" name="price" id="price" value="<?php echo esc_html($product->price); ?>" >
        </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea rows="7" name="description" id="description" type="text" class="form-control"><?php echo esc_html($product->description); ?></textarea>
    </div>

    <label for="category_id">Categoria</label>
    <select name="category_id" id="category_id" type="text" class="form-control" value="<?php echo esc_html($product->category_id); ?>">
        <option value="0"> - Scegli una categoria - </option>
        <option <?php if ($product->category_id == '1' ) echo 'selected' ; ?> value="1">Categoria 1</option>
        <option <?php if ($product->category_id == '2' ) echo 'selected' ; ?> value="2">Categoria 2</option>
    </select>

    <input type="hidden" name="id" value="<?php echo esc_html($product->id); ?>">
    <input name="update" type="submit" class="btn btn-primary" value="Modifica Articolo">
</form>