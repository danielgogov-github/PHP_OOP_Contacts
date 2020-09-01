<?php

namespace Classes;

class HTML_base {
    /**
     * @param string $title
     * @return string
     * 
     */
    public static function create_header(string $title = '') : string {
        $header =
'<!DOCTYPE html>
<html lang="en">
        
<!-- Head -->
<head>
    <title>'. $title .'</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="libraries/bootstrap/bootstrap_4.5.2.min.css"> 
</head>

<!-- Body -->
<body>';
        return $header;
    }

    /**
     * @return string
     * 
     */
    public static function create_footer() : string {
        $footer = '
    <hr>
    <footer class="container-fluid bg-info text-light text-center">
        <p class="p-3">PHP OOP Contacts</p>
    </footer>        
    <!-- Scripts -->
    <script src="libraries/bootstrap/jquery_3.5.1.slim.min.js"></script>    
    <script src="libraries/bootstrap/popper.js_1.16.1.min.js"></script>    
    <script src="libraries/bootstrap/bootstrap_4.5.2.min.js"></script>    
</body>

</html>';
        return $footer;
    }    
}
