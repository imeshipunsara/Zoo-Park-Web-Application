<?php



class DBConnection
{
    public static function GetConnection()
    {
        try
        {
            $server="localhost";
            $db="zoo-park-db-v1";
            $un="root";
            $pw="";
            $conn=new PDO("mysql:host=$server;dbname=$db",$un,$pw);
            return $conn;
            
        }catch (Exception $ex) {
            throw $ex;
        }
    } 
}
?>