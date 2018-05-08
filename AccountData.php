<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 7:03 PM
 */
require_once('DBUtilities.php');

class AccountData
{
    public static function findLastnameByUsername($username)
    {
        $lastname = NULL;
        $connection = DBUtilities::openConnection();
        if ($connection) {
            $sql = "SELECT lastname FROM account WHERE username = '"
                . $username . "'";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    $lastname = $row['lastname'];
                }
            }
            $connection->close();
        }
        return $lastname;
    }
}