<?php
   include_once("config.php");

   if($connect){
    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            $title = $_POST['title'];
            $color = $_POST['bgcolor'];
            $desc = $_POST['desc'];

            $title = str_replace("'", "\'", $title);
            $color = str_replace("'", "\'", $color);
            $desc = str_replace("'", "\'", $desc);

            $querySQL = "INSERT INTO NOTES (title, descr, bgcolor) VALUES ('$title', '$desc', '$color')";

            // $querySQL = str_replace("'", "\'", $querySQL);

            $result  = $connect -> query($querySQL);
            if($result){
                echo json_encode(array("STATUS" => '200', 'MESSAGE' => 'POSTED_SUCCESS'));
            }else{
                echo json_encode(array("STATUS" => '500', 'MESSAGE' => 'POSTED_FAILED'));
            }
            break;
        case 'GET':
            $getAll = "SELECT * FROM NOTES ORDER BY noteId  DESC";
            $result = $connect -> query($getAll);

            $data_array = array();
            while( $row = $result -> fetch_assoc() ){
                $data_array[] = $row;
            }
            echo json_encode(array("STATUS" => '200', "NOTES"=> $data_array));
            break;
    }
   } else {
    echo json_encode(array("Connection" => "Error"));
   }
?>