<?php

    include_once '../controllers/wisdom_controller.php';

    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods:POST");

    $data=json_decode(file_get_contents("php://input"));

    $wisdom_controller=new WisdomController();

    echo $wisdom_controller->addWisdom_C($data);

   
    /**
    this id reseved $data when you need to add wisdom you must send the next
    {
      "wisdom_text":"Wellcom In CompaStudent System!",
      "wisdom_on":"Ibrahim Dayoub",
      "wisdom_from":"Team"
    }
    */

?>


