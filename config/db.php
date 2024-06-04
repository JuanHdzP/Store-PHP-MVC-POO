<?php
class Database
{
    public static function connect()
    {
        $conn = new mysqli("localhost", "root", "", "tienda_master");
        $conn->query("SET NAMES 'utf8'");
        return $conn;
    }
}
