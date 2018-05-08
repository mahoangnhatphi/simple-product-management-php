<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 6:00 PM
 */
include_once('auth.php');
require_once('ProductData.php');
$id = $_GET['id'];
$lastSearch = $_GET['last-search'];

$result = ProductData::delete($id);
if ($result > 0) {
    header('Location: search-product.php?product-name='.$lastSearch.'&delete-success=true');
} else {
    header('Location: search-product.php?product-name='.$lastSearch.'&delete-error=true');
}
?>