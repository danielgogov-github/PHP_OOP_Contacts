<?php

namespace Classes;

use Classes\Database;

class Contact {
    /**
     * 
     */
    public static function all() {
        $all_contacts = array();
        $sql = 'SELECT `id`, `first_name`, `last_name`, `number`, `date_created` FROM `contacts`';
        $db_instance = Database::instance();
        $result = $db_instance->connection()->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $all_contacts[] = $row;
            }
            return $all_contacts;
        }
        return false;
    }

    /**
     * 
     */
    public static function find(int $id) {
        $sql = 'SELECT `id`, `first_name`, `last_name`, `number`, `date_created` FROM `contacts` WHERE `id` = '. $id;
        $db_instance = Database::instance();   
        $result = $db_instance->connection()->query($sql);

        if($result->num_rows === 1) {
            return $result->fetch_assoc();
        }else {
            return false;
        }
    }

    /**
     * @param string $first_name
     * @param string $last_name
     * @param string $number
     * @return bool
     * 
     */
    public static function save(string $first_name, string $last_name, string $number, int $date_created) : bool {
        $sql = "INSERT INTO `contacts` (`first_name`, `last_name`, `number`, `date_created`) VALUES ('$first_name', '$last_name', '$number', '$date_created')";
        $db_instance = Database::instance();
        return $db_instance->connection()->query($sql);
    }

    /**
     * @param int $id
     * @param string $first_name
     * @param string $last_name
     * @param string $number
     * @return bool
     * 
     */
    public static function update(int $id, string $first_name, string $last_name, string $number) : bool {
        $sql = "UPDATE `contacts` SET `first_name`= '$first_name', `last_name`= '$last_name' ,`number`= '$number' WHERE `id` = $id";
        $db_instance = Database::instance();
        return $db_instance->connection()->query($sql);           
    }

    /**
     * @param int $id
     * @return bool
     * 
     */
    public static function delete(int $id) : bool {
        $contact = self::find($id);
        if($contact) {
            $sql = 'DELETE FROM `contacts` WHERE `id` = '. $contact['id'];
            $db_instance = Database::instance();        
            return $db_instance->connection()->query($sql); 
        }
        return false;
    }
}
