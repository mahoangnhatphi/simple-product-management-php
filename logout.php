<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 7:52 PM
 */
session_start();
session_destroy();
header('Location: login.html')
?>