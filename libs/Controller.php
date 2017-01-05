<?php

class Controller {

    function __construct() {
        //echo 'Main controller<br />';
        $this->view = new View();
//        $this->dashboardModel = $this->loadModel('dashboard');
    }

    /**
     *
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = 'app/models/',$return=false) {

        $path = $modelPath . $name.'_model.php';

        if (file_exists($path)) {
            require $modelPath .$name.'_model.php';

            $modelName = $name . '_Model';
            if($return){
                $modelObject = new $modelName();
                var_dump($modelObject);
                return $modelObject;
            }else{

                $this->model = new $modelName();
            }

        }
    }

    public function getUserList(){

        $this->view->userList = $this->model->getUserList();
        $this->view->render('dashboard/user-list',false);

    }

    public function sideBarList(){

        $this->view->render('dashboard/sidebar-list',false);

    }

    public function getTopList(){

        $this->view->render('dashboard/top-list',false);

    }

    public function showUserMap(){

        $this->view->render('user/map',false);

    }

}