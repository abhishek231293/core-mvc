<?php

class View {

    public $dataSet;

    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $noInclude = true)
    {

        if($noInclude){
            require 'app/views/header.php';
        }

        require 'app/views/' . $name . '.php';

        if($noInclude){
            require 'app/views/footer.php';
        }
    }

}