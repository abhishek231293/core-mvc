<?php

class Request extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->dataSet['controller'] = $this;
    }

    /**
     * RequestController::index()
     *
     * @return
     */
    function index() {
        $requestedMethod = $this->filterUserRequest($_REQUEST['requestFor']);
        if (method_exists($this, $requestedMethod)) {
            $this->{$requestedMethod}();
        } else {
            $this->callErrorPage();
        }
    }

    /**
     * RequestController::filterUserRequest()
     *
     * @param mixed $requestFor
     * @return
     */
    function filterUserRequest($requestFor)
    {
        switch ($requestFor) {
            case 'add-new-user' : return "addNewUser";
            case 'upload-image' : return "uploadImage";

            default:return 'invalidCall';
        }
    }

    function addNewUser(){

        $filterData = $_REQUEST['filter-data'];

        $returnData = $this->model->addNewUser($filterData);

        echo $returnData;


    }
    function uploadImage(){
        echo 'ouinm';
        print_r($_FILES);exit;
        $filterData = $_REQUEST['filter-data'];

        $returnData = $this->model->addNewUser($filterData);

        echo $returnData;


    }
}