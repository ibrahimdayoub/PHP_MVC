<?php

    //import response or status codes
    include_once '../config/status_codes.php';

    class WisdomModel
    { 
        /*variables here from this class if you need it as middle ex: between database and controller as temparory variables
        private string $wisdom_text;
        private string $wisdom_on;
        private string $wisdom_from;
        */
        private string $table="wisdoms";
        private static PDO $connect;

        function __construct(PDO $connect)
        {
            self::$connect=$connect;
            //self::$connect will using to connect actually with databse
            //$connect will comming from controller
        }

        function addWisdom_M($data)
        {
            //variables here from database it's columns names
            $query_text="INSERT INTO $this->table (wisdom_text,wisdom_on,wisdom_from) VALUES (?,?,?)";

            try
            {
                //variables here from front end it's comeing as a json data by request
                //prepare query
                $query_statement=self::$connect->prepare($query_text);

                //bind ? sympols
                $query_statement->bindParam(1,$data->wisdom_text);
                $query_statement->bindParam(2,$data->wisdom_on);
                $query_statement->bindParam(3,$data->wisdom_from);

                //execute query
                $query_statement->execute();

                return [CREATED,null];
            }

            catch(PDOException $exp)
            {
                return [BAD_REQUEST,$exp];
            }
        }

        function getWisdoms_M()
        {
            $query_text="SELECT * FROM $this->table";

            try
            {
                $query_statement=self::$connect->prepare($query_text);
                $query_statement->execute();
                $rowCount=$query_statement->rowCount();
                if($rowCount>0)
                {
                    $wisdoms_array=[];//or array() this is object that convert to or from json
                    $wisdoms_array['wisdoms']=[];//or array() this is item that containes all data

                    while($rowData=$query_statement->fetch(PDO::FETCH_ASSOC))
                    {
                        $wisdom=[
                            "id"=>$rowData['id'],
                            "wisdom_text"=>$rowData['wisdom_text'],
                            "wisdom_on"=>$rowData['wisdom_on'],
                            "wisdom_from"=>$rowData['wisdom_from']
                        ];
                    
                        array_push($wisdoms_array['wisdoms'],$wisdom);
                    }

                    return [OK,$wisdoms_array];
                }

                else
                {
                    return [NOT_FOUND,null];
                }
            }

            catch(PDOException $exp)
            {
                return [BAD_REQUEST,$exp];
            }

        }
    }

?>