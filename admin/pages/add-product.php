<?php
$errMsg = '';

//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();
global $loggedInUser;

if (isset($_POST['add'])) {

    $image = htmlspecialchars(trim($_POST['image']));
    $name = htmlspecialchars(trim($_POST['name']));
    $price = htmlspecialchars(trim($_POST['price']));
    $description = htmlspecialchars(trim($_POST['description']));
    $category_id = htmlspecialchars(trim($_POST['category_id']));
    $merchant = htmlspecialchars(trim($_POST['merchant']));
    $brand = htmlspecialchars(trim($_POST['brand']));
    $merchant = htmlspecialchars(trim($_POST['merchant']));

    if ($image != '' && $name != '' && $category_id != '' && $category_id != '0' && $description != '' && $price != '' && $brand != '' && $brand != '0' && $merchant != '' && $merchant != '0') {

        $id = $productMgr2->addToProduct($image, $name, $price, $description, $category_id, $brand, $merchant);

        if ($id > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=products-list&msg=created';</script>";
            exit;
        } else {
            $alertMsg = 'err';
        }
    } else {
        $alertMsg = 'mandatory_fields';
    }
}

$categorys = $productMgr->getAllCategory();
$brands = $productMgr->getAllBrand();
$merchants = $productMgr->getAllMerchant();
?>

<a href="<?php echo ROOT_URL . "admin/?page=products-list"; ?>" class="back underline">&laquo; Lista Prodotti</a>

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
    <select name="category_id" id="category_id" type="text" class="form-control" value="<?php echo $category['id']; ?>">
        <option value="0"> - Scegli una categoria - </option>
        <?php if ($categorys) : ?>
            <?php foreach ($categorys as $category) : ?>

                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Nessuna categoria disponibile</p>
        <?php endif; ?>
    </select>

    <label for="brand" class="mt-3">Brand</label>
    <select name="brand" id="brand" type="text" class="form-control" value="<?php echo $brand['id']; ?>">
        <option value="0"> - Scegli un Brand - </option>
        <?php if ($brands) : ?>
            <?php foreach ($brands as $brand) : ?>

                <option value="<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></option>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Nessuna Brand disponibile</p>
        <?php endif; ?>
    </select>

    <label for="merchant" class="mt-3">Fornitore</label>
    <select name="merchant" id="merchant" type="text" class="form-control" value="<?php echo $merchant['id']; ?>">
        <option value="0"> - Scegli un Fornitore - </option>
        <?php if ($merchants) : ?>
            <?php foreach ($merchants as $merchant) : ?>

                <option value="<?php echo $merchant['id']; ?>"><?php echo $merchant['name']; ?></option>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Nessun Fornitore disponibile</p>
        <?php endif; ?>
    </select>

    <button class="btn btn-primary mt-4" type="submit" name="add">Aggiungi</button>
</form>