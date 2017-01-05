<?php

class Dashboard_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserList()
    {

        $stmt = $this->db->prepare("SELECT admin.*,department.department_name,state.state_name FROM admin 
                                    left join department on department.id = admin.department_id 
                                    left join state on state.id = admin.state_id 
                                    where admin.email IS NOT NULL and admin.email != ''");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = array();
        while($row = $stmt->fetch()){

            $result[] = $row;
        }

        return $result;
    }

}