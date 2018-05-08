<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 4:08 PM
 */

require_once('DBUtilities.php');
$conn = DBUtilities::openConnection();
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
$success = false;
if (isset($_POST['username']) && isset($_POST['password'])) {
    $login = true;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM account WHERE username = '"
        . $username . "' And password = '" . $password . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $success = true;
    } else {
        $_REQUEST['INVALID'] = 'Invalid username or password';
    }
    mysqli_close($conn);
}
if ($success) {
    require_once('AccountData.php');
    session_start();
    $_SESSION['USERNAME'] = AccountData::findLastnameByUsername($username);
    header('Location: search-product.php');
} else {
    include_once('invalid.php');
}
exit();
?>