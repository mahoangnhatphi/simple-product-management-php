<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 7:02 PM
 */
session_start();
if (!isset($_SESSION['USERNAME'])) {
    header('Location: login.html');
    exit();
}
?>