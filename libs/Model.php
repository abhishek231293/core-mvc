<?php

class Model {

    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    function render($name, $modelPath = 'app/models/')
    {
        $path = $modelPath . $name.'_model.php';

        if (file_exists($path)) {

            require $modelPath .$name.'_model.php';
            $modelName = $name . '_Model';
            $modelObject = new $modelName();
//            echo $modelName;
//            echo "<pre>"; print_r($modelObject);exit;
            return $modelObject;
        }else{
            return "";
        }
    }
}