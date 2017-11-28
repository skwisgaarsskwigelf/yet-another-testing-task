<?php
$form_data = array();
if (empty($_POST['name']) || empty($_POST['text'])) { 
    $form_data['error_msg']  = "Поля не могут быть пустыми";
}
else { 
    $form_data['success_msg'] = 'Запись добавлена';
}
echo json_encode($form_data);