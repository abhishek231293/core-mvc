<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->controller = $this;
    }
    
    function index() 
    {    
        $this->view->title = 'User Statistics';
//        $userList = $this->model->getUserList();
//        $this->view->userList = $userList;
        $this->view->render('user/index');
    }

}