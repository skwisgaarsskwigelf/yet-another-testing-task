<?php
/**
 * Created by PhpStorm.
 * User: ratherrum
 * Date: 28.11.17
 * Time: 12:28
 */
require_once __DIR__ . "/postPosts.php";

$data_sent = array();
if (empty($_POST['name']) || empty($_POST['text'])) {
    $data_sent['error_msg'] = "Поля не могут быть пустыми";
} else {
    $data_sent['success_msg'] = 'Запись добавлена';
    $data_array = ["data_name" => $_POST['name'], "data_body" => $_POST['text'], "data_time" => date('Y-m-d H:i:s')];
    $obj = new postPosts();
    $obj->main($data_array);
}
echo json_encode($data_sent);