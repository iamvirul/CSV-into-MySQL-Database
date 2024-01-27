<?php

class Database
{

    public static $connection;

    public static function setUpConnection()
    {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("127.0.0.1", "root", "200528100634@Vn", "ExcelData", "3306");
        }
    }

    public static function iud($q)
    {
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {
        Database::setUpConnection();
        return Database::$connection->query($q);
    }
}
