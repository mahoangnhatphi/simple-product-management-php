<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 4:47 PM
 */

class DBUtilities
{

    public static function openConnection()
    {
        $dbhost = 'localhost:3308';
        $dbuser = 'root';
        $dbpassword = '';
        $dbname = 'phpdemo';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        return $conn;
    }
}
?>