<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE email='".$_REQUEST['login']."' AND password='".$_REQUEST['password']."' LIMIT 1");
        // FormWater FormAir
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = array();
        while($row = $stmt->fetch()){
            $result[] = $row;
        }

        $count = count($result);

        if ($count > 0) {
            unset($result[0]['password']);
            // login
            Session::init();
            Session::set('role', $result[0]['auth']);
            Session::set('loggedIn', true);
            Session::set('userid', $result[0]['id']);
            Session::set('userDetail',$result);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }
        
    }

    public function daata(){
        return 'ibguinmj';
    }
    
}