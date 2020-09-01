<?php

namespace Classes;

class HTML extends HTML_base {
    /**
     * @param array $all_contacts
     * @return string
     * 
     */
    public static function create_table(array $all_contacts) : string {
        $table = '';
        $table .= 
    '<div class="table-responsive">
        <table class="table table-striped table-bordered text-center mb-0">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Number</th>
                    <th>Created</th>
                    <th>-</th>
                    <th>-</th>            
                </tr>
            </thead>
            <tbody>';
                foreach($all_contacts as $contact) {
                    $table .= 
                    '<tr>
                        <td>'. $contact['first_name'] .'</td>
                        <td>'. $contact['last_name'] .'</td>
                        <td>'. $contact['number'] .'</td>
                        <td>'. date('d-m-Y H:i', $contact['date_created']) .'</td>
                        <td><button class="btn btn-info"><a href="create_edit.php?id='. $contact['id'] .'" class="text-decoration-none text-light">Edit</a></button></td>
                        <td><button class="btn btn-info"><a href="delete.php?id='. $contact['id'] .'" class="text-decoration-none text-light">Delete</a></button></td>
                    </tr>';
                }            
            $table .= '
            </tbody>                    
        </table>
    </div>';     
        return $table;
    }

    /**
     * @param string $form_action
     * @param string $first_name
     * @param string $last_name
     * @param string $number
     * @param string $button_label
     * @return string
     * 
     */
    public static function create_form(string $form_action, string $first_name = '', string $last_name = '', string $number = '', string $button_label = 'Create') : string {
        $form = '
    <div class="row m-0">
        <div class="col-sm-1 col-xl-4"></div>

        <div class="col-sm-10 col-xl-4">
            <form action="'. $form_action .'" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-2 text-center">
                            <label for="first_name">Firstname</label>
                        </div>
                        <div class="col">
                            <input type="text" name="first_name" value="'. $first_name .'" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 text-center">
                            <label for="last_name">Lastname</label>
                        </div>
                        <div class="col">
                            <input type="text" name="last_name" value="'. $last_name .'" class="form-control" required>
                        </div>
                    </div>
                                    
                    <div class="row">
                        <div class="col-2 text-center">
                            <label for="number">Number</label>
                        </div>
                        <div class="col">
                        <input type="text" name="number" value="'. $number .'" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <input type="submit" value="'. $button_label .'" class="btn btn-info mt-2 ml-5">
                    </div>                    
                </div>
            </form>
        </div>

        <div class="col-sm-1 col-xl-4"></div>
    </div>';
        return $form;
    }

    /**
     * @param int $contact_id
     * @return string
     * 
     */
    public static function create_delete_buttons(int $contact_id) : string {
        $buttons = '
        <div class="text-center">
            <button class="btn btn-danger"><a href="delete.php?id='. $contact_id .'&confirm=1" class="text-decoration-none text-light">Yes</a></button>
            <button class="btn btn-info"><a href="index.php" class="text-decoration-none text-light">No</a></button>
        </div>';
        return $buttons;
    }

    public static function show_status(string $status, string $alert_type) : string {
        $status = '
        <div class="alert alert-'. $alert_type .' alert-dismissible fade show text-center">'. $status .'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>        
        ';
        return $status;
    }

    /**
     * 
     * @return string
     */
    public static function create_navigation() : string {
        $navigation = '
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a href="index.php" class="navbar-brand">PHP OOP Contacts</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item  nav-link">Home</a>
                <a href="create_edit.php" class="nav-item  nav-link">Create</a>
            </div>
        </div>    
    </nav>
    <hr>';   
        return $navigation;
    }
}
