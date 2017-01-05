<?php

class Request_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addNewUser($filterData)
    {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE email='".$filterData['email']."' ");
        // FormWater FormAir
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = array();
        while($row = $stmt->fetch()){
            $result[] = $row;
        }

        $count = count($result);
        if ($count > 0) {
            return 'Email ID already exist.';
        } else {

            $name= stripslashes(trim($filterData['name']));
            $email = stripslashes(trim($filterData['email']));
            $password = stripslashes(trim($filterData['password']));
            $department = stripslashes(trim($filterData['department']));
            $state = stripslashes(trim($filterData['state']));
            $address = stripslashes(trim($filterData['address']));

            $stmt =   $this->db->prepare(" INSERT into admin ( name, email, password,department_id, state_id, address) VALUES ( :name, :email, :password, :department, :state, :address)" );
            $params = array('name' => $name,'email' => $email, 'password'=>$password, 'department' => $department, 'state' => $state, 'address' => $address);
            $stmt->execute($params);

            return 'Successfuly Added';
        }

    }

}