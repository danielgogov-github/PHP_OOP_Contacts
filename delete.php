<?php

spl_autoload_register();
use Classes\Contacts;
use Classes\HTML;

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $contacts = new Contacts();
    $status = null;
    $renderer = '';

    if(isset($_GET['confirm']) && intval($_GET['confirm']) === 1) {
        $status = $contacts->delete_contact($id);
        exit(header('Location: index.php?status='. $status));
    }

    $current_contact = $contacts->find_contact($id);
    $renderer .= '<p class="text-center">Are you sure you want to delete <span class="font-weight-bold">'. $current_contact['first_name'] .' '. $current_contact['last_name'] .'</span> ?</p>';
    $renderer .= HTML::create_delete_buttons($id);    
    echo HTML::create_header();
    echo HTML::create_navigation();
    echo $renderer;
    echo HTML::create_footer();    

}else {
    exit(header('Location: index.php'));
}
