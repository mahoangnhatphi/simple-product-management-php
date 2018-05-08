<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 5:44 PM
 */
include_once('auth.php');
require_once('ProductData.php');
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$lastSearch = $_POST['last-search'];
$result = ProductData::update($id, $name, $price, $quantity);
if ($result > 0) {
   header('Location: search-product.php?product-name='.$lastSearch.'&update-success=true');
} else {
    header('Location: search-product.php?product-name='.$lastSearch.'&update-error=true');
}
?>