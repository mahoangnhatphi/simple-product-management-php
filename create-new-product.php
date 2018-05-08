<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Product Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="font-awesome/css/fontawesome-all.css"/>
</head>
<body>
<?php
include_once('auth.php');
$lastSearch = $_REQUEST['last-search'];
?>
<div class="top-header col-md-12">
    <div class="welcome text-right">
        Welcome, <?= $_SESSION['USERNAME']; ?>
        <a href="logout.php" class="button-logout">
            <i class="fas fa-power-off"></i>
        </a>
    </div>
</div>
<div class="col-lg-12 content-container">
     <span class="col-lg-2 menu">
        <ul class="menu-content nav nav-pills nav-stacked">
            <li>
                <a href="search-product.php?product-name=<?= $lastSearch ?>">Product</a>
            </li>
        </ul>
    </span>
    <span class="column-right col-lg-10">
        <div class="h3 title">Create New Product</div>
        <a class="search-page-link"
           href="search-product.php?product-name=<?= $lastSearch ?>">Click here to Search Page</a>
        <div class="create-form">
        <form action="#" method="post">
            <div class="form-group row">
                <label for="name" class="col-md-1">Name</label>
                <input class="form-control col-md-6" type="text" name="name" value="" required minlength="5"
                       maxlength="50"/>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-1">Price</label>
                 <input class="form-control col-md-6" type="number" name="price" value="" required min="0"
                        step="0.00001"/>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-1">Quantity</label>
                <input class="form-control col-md-6" type="number" name="quantity" value="" required min="0" step="1"/>
            </div>
            <div class="form-group row">
                 <div class="col-md-1"></div>
                 <input type="submit" value="Create New Product" class="btn btn-outline-success col-md-2"/>
                    <div class="col-sm-1"></div>
                 <input type="reset" value="Reset" class="btn btn-outline-secondary col-md-2"/>
                        <input type="hidden" name="last-search" value="<?= $lastSearch; ?>">
            </div>
        </form>
            </div>
        </span>
</div>
<?php
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity'])) {
    require_once('ProductData.php');
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $result = ProductData::createNewProduct($name, $price, $quantity);
    if ($result > 0) {
        header('Location: search-product.php?product-name=' . $lastSearch . '&create-success=true');
    } else {
        header('Location: search-product.php?product-name=' . $lastSearch . '&create-error=true');
    }
}
?>
</body>
</html>