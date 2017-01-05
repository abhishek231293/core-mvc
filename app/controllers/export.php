<?php

class Export extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->controller = $this;
    }

    function index()
    {
        $this->view->title = 'Export';
        $this->view->render('export/index');
    }


}