<?php
    $errMsg = '';

    //evitare manipolazioni
    if (!defined('ROOT_URL')){
        die;
    }

    $productMgr = new ProductManager();

    if (isset($_POST['add'])) {

        $image = htmlspecialchars(trim($_POST['image']));
        $name = htmlspecialchars(trim($_POST['name']));
        $price = htmlspecialchars(trim($_POST['price']));
        $description = htmlspecialchars(trim($_POST['description']));
        $category_id = htmlspecialchars(trim($_POST['category_id']));
      
        if ($image != '' && $name != '' && $category_id != '' && $category_id != '0' && $description != '' && $price != '') {
      
            $id = $productMgr->create(new Product(0, $image, $name, $price, $description, $category_id));

            if ($id > 0) {
                echo "<script>location.href='".ROOT_URL."admin?page=products-list&msg=created';</script>";
                exit;
            } else {
                $alertMsg = 'err';
            }
        } else {
            $alertMsg = 'mandatory_fields';
        }
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
        <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">€</span>
            </div>
            <input type="text" class="form-control" name="price" id="price">
        </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea rows="7" name="description" id="description" type="text" class="form-control"></textarea>
    </div>

    <label for="category_id">Categoria</label>
    <select name="category_id" id="category_id" type="text" class="form-control" value="<?php echo esc_html($product->category_id); ?>">
        <option value="0"> - Scegli una categoria - </option>
        <option value="1">Categoria 1</option>
        <option value="2">Categoria 2</option>
    </select>

    <button class="btn btn-primary" type="submit" name="add">Aggiungi</button>
</form>