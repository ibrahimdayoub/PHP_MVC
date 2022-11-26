<?php

    //import
    include_once '../config/database.php';
    include_once '../models/wisdom_model.php';
    include_once '../config/status_codes.php';

    class WisdomController
    {
        private WisdomModel $wisdom;

        function __construct()
        {
            $data_base=new Database();
            $this->wisdom=new WisdomModel($data_base->connection());
        }

        function addWisdom_C($data)
        {
            //validation
            if(!empty($data->wisdom_text) && !empty($data->wisdom_on) && !empty($data->wisdom_from))
            {
                [$code,$exp]=$this->wisdom->addWisdom_M($data);

                switch($code)
                {
                    case CREATED: $output=["message"=>"wisdom added!"]; break;
                    case BAD_REQUEST: $output=["message"=>"something error! ".$exp->getMessage()]; break;
                    default:
                            $code=FORBIDDEN;
                            $output=["message"=>"not allowed!"];
                }
            }

            else
            {
                $code=NOT_FOUND;
                $output=["message"=>"check data!"];
            }

            http_response_code($code);
            return json_encode($output);
        }

        function getWisdoms_C()
        {
            [$code,$exp]=$this->wisdom->getWisdoms_M();

            switch($code)
            {
                case OK: $output=$exp; break;
                case NOT_FOUND: $output=["message"=>"no thing to show"]; break;
                case BAD_REQUEST: $output=["message"=>"something error! ".$exp->getMessage()]; break;
                default:
                $code=FORBIDDEN;
                $output=["message"=>"not allowed!"];
            }

            http_response_code($code);
            return json_encode($output);
        }
    }

?>