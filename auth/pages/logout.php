<?php 
$user = $_SESSION['user'];

$cm = new CartManager();
$cm->clearUserCart($_SESSION['client_id']);

unset($_SESSION['user']);
echo '<script>location.href="'.ROOT_URL.'auth?page=login"</script>';
exit;
