<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 10:46 AM
 */
define('PRONAME', 'PHP');
$numbers = array( 1, 2, 3, 4, 5);

foreach( $numbers as $value ) {
    print("Value is ".$value."<br/>");
}
$numbers[0] = 'Tran Van Ot';
foreach( $numbers as $value ) {
    print("Value is ".$value."<br/>");
}
$product = array("code" => "p001", "name" => "Biti's Snow U23", "price" => 1000);

$marks = array(
    "mohammad" => array (
        "physics" => 35,
        "maths" => 30,
        "chemistry" => 39
    ),

    "qadir" => array (
        "physics" => 30,
        "maths" => 32,
        "chemistry" => 29
    ),

    "zara" => array (
        "physics" => 31,
        "maths" => 22,
        "chemistry" => 39
    )
);
foreach ($marks as $m) {
    echo $m["maths"];
}

print($product["code"]);

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    print('Hello ' . $name . '. Welcome to '.PRONAME);
    echo 'Name length'.strlen($name);
}

if ($_POST['location']) {
    $location = $_POST['location'];
    header('Location:$location');
    exit();
}
?>

<html>
<head>
    <title>Php Demo</title>
</head>
<body>
<h1>Php Demo</h1>
<form action="#" method="get">
    Your name <input type="text" name="name"/>
    <input type="submit" value="Send">
</form>

<form action="#" method="post">
    <select name="location">
        <option value="http://google.com">Google</option>
        <option value="http://www.tutorialspoint.com">Tutorials Point</option>
    </select>
    <input type = "submit" />
</form>
</body>
</html>

