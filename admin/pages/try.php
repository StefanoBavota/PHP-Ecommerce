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
        $product = $mgr->get($id);
      
        $lblAction = 'Modifica';
        $submit = 'update';
    }

    if (isset($_POST['update_product'])) {

        $image = trim($_POST['image']);
        $name = trim($_POST['name']);
        $category_id = trim($_POST['category_id']);
        $description = trim($_POST['description']);
        $price = trim($_POST['price']);
        $id = trim($_POST['id']);
      
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
        <input name="image" id="image" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="name">Nome prodotto</label>
        <input name="name" id="name" type="text" class="form-control" value="<?php echo esc_html($product->name); ?>">
    </div>

    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="text" class="form-control" name="price" id="price" value="<?php echo esc_html($product->price); ?>" >
    </div>

    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea rows="7" name="description" id="description" type="text" class="form-control"><?php echo esc_html($product->description); ?></textarea>
    </div>

    <label for="category_id">Categoria</label>
    <select name="category_id" id="category_id" type="text" class="form-control" value="<?php echo esc_html($product->category_id); ?>">
        <option value="0"> - Scegli una categoria - </option>
        <option value="1">Categoria 1</option>
        <option value="2">Categoria 2</option>
    </select>

    <input type="hidden" name="id" value="<?php echo esc_html($product->id); ?>">
    <button class="btn btn-primary" type="submit" name="update_product">Modifica</button>
</form>