<?php
//evitare manipolazioni
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$productMgr2 = new ProductManager2();

global $alertMsg;

if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $product = $productMgr->getProductById($id)[0];
    $categoryId = $productMgr->getCategoryById($product['category_id'])[0];
    $brandId = $productMgr->getBrandById($product['brand_id'])[0];
    $merchantId = $productMgr->getMerchantById($product['merchant_id'])[0];
}

if (isset($_POST['update'])) {

    $id = htmlspecialchars(trim($_POST['id']));
    $image = htmlspecialchars(trim($_POST['image']));
    $name = htmlspecialchars(trim($_POST['name']));
    $price = htmlspecialchars(trim($_POST['price']));
    $description = htmlspecialchars(trim($_POST['description']));
    $category_id = htmlspecialchars(trim($_POST['category_id']));
    $brand = htmlspecialchars(trim($_POST['brand']));
    $merchant = htmlspecialchars(trim($_POST['merchant']));

    if ($image != '' && $name != '' && $description != '' && $price != '') {

        $res = $productMgr2->updateProduct($id, $image, $name, $price, $description, $category_id, $brand, $merchant);

        if ($res > 0) {
            echo "<script>location.href='" . ROOT_URL . "admin?page=products-list&msg=updated';</script>";
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

<div class="mt-5 mb-4">
    <a href="<?php echo ROOT_URL . "admin/?page=products-list"; ?>" class="back underline scuro">&laquo; Lista Prodotti</a>
</div>

<h2 class="mb-4">Modifica Prodotto</h2>

<form method="post">

    <div class="form-group">
        <label for="image">Immagine</label>
        <input name="image" id="image" type="text" class="form-control" value="<?php echo $product['image']; ?>">
    </div>

    <div class="form-group">
        <label for="name">Nome prodotto</label>
        <input name="name" id="name" type="text" class="form-control" value="<?php echo $product['name']; ?>">
    </div>

    <div class="form-group">
        <label for="price">Prezzo</label>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">€</span>
                </div>
                <input type="text" class="form-control" name="price" id="price" value="<?php echo $product['price']; ?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea rows="7" name="description" id="description" type="text" class="form-control"><?php echo $product['description']; ?></textarea>
    </div>

    <label for="category_id">Scegli una categoria</label>
    <select name="category_id" id="category_id" type="text" class="form-control">
        <option value=<?php echo $categoryId['id']; ?>> <?php echo $categoryId['name']; ?> </option>
        <?php if ($categorys) : ?>
            <?php foreach ($categorys as $category) : ?>

                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Nessuna categoria disponibile</p>
        <?php endif; ?>
    </select>

    <label for="brand" class="mt-3">Scegli un Brand</label>
    <select name="brand" id="brand" type="text" class="form-control">
        <option value=<?php echo $brandId['id']; ?>> <?php echo $brandId['name']; ?> </option>
        <?php if ($brands) : ?>
            <?php foreach ($brands as $brand) : ?>

                <option value="<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></option>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Nessuna Brand disponibile</p>
        <?php endif; ?>
    </select>

    <label for="merchant" class="mt-3">Scegli un Fornitore</label>
    <select name="merchant" id="merchant" type="text" class="form-control">
        <option value=<?php echo $merchantId['id']; ?>> <?php echo $merchantId['name']; ?> </option>
        <?php if ($merchants) : ?>
            <?php foreach ($merchants as $merchant) : ?>

                <option value="<?php echo $merchant['id']; ?>"><?php echo $merchant['name']; ?></option>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Nessun Fornitore disponibile</p>
        <?php endif; ?>
    </select>

    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <input name="update" type="submit" class="btn btn-primary mt-5" value="Modifica Articolo">
</form>