<?php
/**
 * Created by PhpStorm.
 * User: Phi
 * Date: 07-May-18
 * Time: 6:11 PM
 */
require_once('DBUtilities.php');

class ProductData
{
    public static function update($id, $name, $price, $quantity)
    {
        $connection = DBUtilities::openConnection();
        $result = false;
        if ($connection) {
            $sql = "update product set name = '" . $name . "', price = " . $price . ", quantity = " . $quantity . " where id = " . $id;
            $stmt = $connection->prepare($sql);
            $result = $stmt->execute();
        }
        return $result;
    }

    public static function delete($id)
    {
        $connection = DBUtilities::openConnection();
        $result = false;
        if ($connection) {
            $sql = "delete from product where id = " . $id;
            $stmt = $connection->prepare($sql);
            $result = $stmt->execute();
        }
        return $result;
    }

    public static function createNewProduct($name, $price, $quantity)
    {
        $connection = DBUtilities::openConnection();
        $result = false;
        if ($connection) {
            $sql = "insert into product(name, price, quantity) values('" . $name . "', " . $price . "," . $quantity . ")";
            $stmt = $connection->prepare($sql);
            $result = $stmt->execute();
        }
        return $result;
    }

    public static function findByProductName($productName)
    {
        $products = array();
        $connection = DBUtilities::openConnection();
        if ($connection) {
            $sql = "select * from product where name like '%" . $productName . "%'";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($products, array(
                            'id' => $row['id'],
                            'name' => $row['name'],
                            'price' => $row['price'],
                            'quantity' => $row['quantity']
                        )
                    );
                }
            }
            $connection->close();
        }
        return $products;
    }
}