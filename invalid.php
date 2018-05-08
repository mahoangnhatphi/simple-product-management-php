<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="font-awesome/css/fontawesome-all.css"/>
</head>
<body class="no-scroll">


<div class="col-lg-12 container">
    <div class="col-md-5 login-form-container login-form-container-invalid">
        <form action="login.php" method="post">
            <h3 class="col-md-12 text-center product-management-title">Product Management</h3>
            <div class="form-group row">
                <div class="col-md-1"></div>
                <?php
                if (isset($_REQUEST['INVALID'])) {
                    echo '<div class="invalid-username-or-password" style="color:red">' . $_REQUEST['INVALID'] . '</div>';
                }
                ?>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-1 col-form-label">
                    <i class="fas fa-user"></i>
                </label>
                <input type="text" name="username" id="username" class="form-control col-md-10"
                       placeholder="Username..." value="<?=$username?>"/>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-1 col-form-label">
                    <i class="fas fa-key"></i>
                </label>
                <input type="password" name="password" id="password" class="form-control col-md-10"
                       placeholder="Password..."/>
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <input type="submit" value="Login" class="btn btn-outline-primary col-md-3"/>
                <div class="col-md-1"></div>
                <input type="reset" value="Reset" class="btn btn-outline-warning col-md-3"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>