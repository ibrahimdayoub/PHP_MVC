<?php

    include_once '../controllers/wisdom_controller.php';
    $wisdom_controller=new WisdomController();

    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods:GET");

    //we send id from js file with the request to protect it's 
    if(isset($_GET["id"])){

        if($_GET["id"]==619){
            echo $wisdom_controller->getWisdoms_C();
        }
        else{
            echo "Try Another Door Not Window Up";
        }
    }
    else{
        echo "Try Another Door Not Window Down";
    }


?>