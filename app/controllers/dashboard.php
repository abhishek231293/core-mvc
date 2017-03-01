<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
//        Auth::handleLogin();
        $this->view->controller = $this;
        $this->view->js = array('dashboard/js/default.js');
    }
    
    function index() 
    {    
        $this->view->title = 'Dashboard';
        $this->view->render('dashboard/index');
    }
    
    function logout()
    {
        Session::destroy();
        header('location: ../login');
        exit;
    }

}