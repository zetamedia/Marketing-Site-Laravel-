<?php
return array( 
    'GET /test' => Array('do' => function() {       
       echo 'Hello World';
    }), 

    'GET /test/(:any)' => function($name) {
        print_r($name);
    }
);
