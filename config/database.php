<?php

    //Connection With Database
    class Database
    {
        function __construct()
        {
            //import environment
            include_once 'environment.php';
        }

        static function connection() : ?PDO
        {
            $connect=null;

            try
            {
                $connect=new PDO('mysql:127.0.0.1='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);
                $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            
            catch(PDOException $exp)
            {
                echo '<h1> Connection With Database Is Failed! </h1><br>';//.$exp->getMessage()
            }

            return $connect;
        }
    }

?>