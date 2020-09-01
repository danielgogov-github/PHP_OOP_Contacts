<?php

spl_autoload_register();
use Classes\Contacts;
use Classes\HTML;

$contacts = new Contacts();

echo HTML::create_header();
echo HTML::create_navigation();
if(isset($_GET['status'])){ echo HTML::show_status(strval($_GET['status']), 'dark'); }
echo HTML::create_table($contacts->all_contacts());
echo HTML::create_footer();
