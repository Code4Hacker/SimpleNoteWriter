<?php
include_once("config.php");

if ($connect) {
    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            $title = $_POST['title'];
            // $color = $_POST['bgcolor'];
            $desc = $_POST['desc'];
            $id = $_POST['id'];

            $title = str_replace("'", "\'", $title);
            $color = str_replace("'", "\'", $color);
            $desc = str_replace("'", "\'", $desc);
            $id = str_replace("'", "\'", $id);

            $querySQL = "UPDATE NOTES SET title = '$title', descr = '$desc' WHERE  noteId = '$id'";

            $result = $connect->query($querySQL);
            if ($result) {
                echo json_encode(array("STATUS" => '200', 'MESSAGE' => 'UPDATE_SUCCESS'));
            } else {
                echo json_encode(array("STATUS" => '404', 'MESSAGE' => 'UPDATE_FAILED'));
            }
            break;
        case 'GET':
            $id = $_GET['id'];
            $id = str_replace("'", "\'", $id);

            $del = "DELETE FROM NOTES WHERE noteId  = '$id'";
            $result = $connect->query($del);

            if ($result) {
                echo json_encode(array("STATUS" => '200', 'MESSAGE' => 'DELETED_SUCCESS'));
            } else {
                echo json_encode(array("STATUS" => '404', 'MESSAGE' => 'DELETED_FAILED'));
            }

            break;
    }
} else {
    echo json_encode(array("Connection" => "Error"));
}
?>