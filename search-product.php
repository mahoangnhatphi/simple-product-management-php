<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Product Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="font-awesome/css/fontawesome-all.css"/>
</head>
<body>
<?php
include_once('auth.php');
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
                <a href="#">Product</a>
            </li>
        </ul>
    </span>
    <span class="column-right col-lg-10">
        <div class="alert-status">
        <?php
        $productName = '';
        if (isset($_GET['product-name'])) {
            $productName = $_GET['product-name'];
        }
        if (isset($_REQUEST['update-success'])) {
            echo '<h5 class="alert-success">Update successfully</h5>';
        }
        if (isset($_REQUEST['update-error'])) {
            echo '<h5 style="color:red">Update function occurs errors</h5>';
        }
        if (isset($_REQUEST['delete-success'])) {
            echo '<h5 class="alert-success">Delete successfully</h5>';
        }
        if (isset($_REQUEST['delete-error'])) {
            echo '<h5 style="color:red">Delete function occurs errors</h5>';
        }
        if (isset($_REQUEST['create-success'])) {
            echo '<h5 class="alert-success">Create new product successfully</h5>';
        }
        if (isset($_REQUEST['create-error'])) {
            echo '<h5 style="color:red">Create new product function occurs errors</h5>';
        }
        ?>
        </div>
        <a class="create-new-product-link" href="create-new-product.php?last-search=<?= $productName ?>">Click here to create new product</a>
        <div class="search-form col-md-12">
            <form action="search-product.php" method="get">
                <div class="form-group row">
                    <label for="product-name" class="col-md-2 col-form-label">Product name</label>
                    <input type="text" name="product-name" value="<?= $productName ?>" class="form-control col-md-6"/>
                    <input type="submit" value="Search" class="btn btn-outline-info button-search"/>
                </div>
            </form>
        </div>
        <?php
        require_once('ProductData.php');
        $result = ProductData::findByProductName($productName);
        if (count($result, 1) > 0) {
            ?>
            <table class="table-product table table-hover table-light table-responsive-md">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 0;
                foreach ($result as $row) {
                    ?>
                    <form action="update-product.php" method="post">
                        <tr>
                            <td><?= ++$count; ?></td>
                            <td>
                                <?= $row['id'] ?>
                                <input type="hidden" name="id" value="<?= $row['id'] ?>"/>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>" minlength="5"
                                       maxlength="50"
                                       required>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="price" value="<?= $row['price'] ?>" required min="0"
                                       step="0.00001">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity" value="<?= $row['quantity'] ?>" required
                                       step="1"
                                       min="0">
                            </td>
                            <td>
                                <input type="submit" value="Update" class="btn btn-outline-success">
                                <input type="hidden" name="last-search" value="<?= $productName ?>">
                            </td>
                            <td>
                                <a href="delete-product?id=<?= $row['id'] ?>&last-search=<?= $productName ?>" class="btn btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </form>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        } else {
            ?>
            <h2 class="no-record">No record is matched!!!</h2>
            <?php
        }
        ?>
    </span>
</div>
</body>
</html>