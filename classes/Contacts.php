<?php

namespace Classes;

use Classes\Contact;

class Contacts {
    /**
     * 
     */
    public function all_contacts() {
        $all_contacts = Contact::all();

        if($all_contacts === false) {
            return 'You have no contacts yet';
        }
        return $all_contacts;
    }    

    /**
     * @param int $id
     * 
     */
    public function find_contact(int $id) {
        return Contact::find($id);
    }

    /**
     * @param array $post_input
     * 
     */
    public function save_contact(array $post_input) {
        foreach($post_input as $key => $field) {
            if(strlen(trim($field)) < 3) {
                throw new \Exception($key);
            }
        }

        $first_name = strval($_POST['first_name']);
        $last_name = strval($_POST['last_name']);
        $number = intval($_POST['number']);
        $date_created = time();
        $new_contact = Contact::save($first_name, $last_name, $number, $date_created);

        if($new_contact === true) {
            return 'Contact was created successfully!';
        }
        return 'Please try again later!';
    }

    /**
     * @param int $id
     * @param array $post_input
     * 
     */
    public function update_contact(int $id, array $post_input) {
        foreach($post_input as $key => $field) {
            if(strlen(trim($field)) < 3) {
                throw new \Exception($key);
            }
        }

        $id = intval($id);
        $first_name = strval($_POST['first_name']);
        $last_name = strval($_POST['last_name']);
        $number = intval($_POST['number']);        
        $contact = Contact::update($id, $first_name, $last_name, $number);

        if($contact === true) {
            return 'Contact was updated successfully!';
        }
        return 'Please try again later!';        
    }

    /**
     * @param int $id
     * 
     */
    public function delete_contact(int $id) {
        $contact = Contact::delete($id);

        if($contact === true) {
            return 'Contact was deleted successfully!';
        }
        return 'Please try again later!';           
    }
}
