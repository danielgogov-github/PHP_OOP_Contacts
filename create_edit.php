<?php

spl_autoload_register();
use Classes\Contacts;
use Classes\HTML;

$contacts = new Contacts();
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $current_contact = $contacts->find_contact($id);
}

$status = '';
if($_POST) {
    try {
        if(isset($current_contact)) {
            $status = $contacts->update_contact($id, $_POST);
            exit(header('Location: index.php?status='. $status));
        }else {
            $status = $contacts->save_contact($_POST);
            exit(header('Location: index.php?status='. $status));
        }
    }catch(Exception $exception) {
        $status = $exception->getMessage() .' is too short!';
    }
}

echo HTML::create_header();
echo HTML::create_navigation();
if($status){ echo HTML::show_status(strval($status), 'danger'); }
if(isset($current_contact)) {
    echo HTML::create_form('create_edit.php?id='. $id, $current_contact['first_name'], $current_contact['last_name'], $current_contact['number'], 'Update');
}else {
    echo HTML::create_form('create_edit.php');
}
echo HTML::create_footer();
