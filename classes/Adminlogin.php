<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();

include_once ($filepath.'/../lib/Database.php');

?>

<?php


/**
 * Admin Login
 */
class Adminlogin{

    private $db;

    public function __construct(){
       $this->db = new Database();

    }

    public function adminLogin($adminUser,$adminPass){

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if(empty($adminUser) || empty($adminPass)){
            return "Username or Password must not be empty";
        }else{
            $query = "SELECT * FROM admin WHERE admin_user = '$adminUser' AND admin_pass = '$adminPass' ";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                Session::set("adminlogin", true);
                Session::set("adminId", $value['admin_id']);
                Session::set("adminUser", $value['admin_user']);
                Session::set("adminName", $value['admin_name']);
                Session::set("adminEmail", $value['admin_email']);

                header("Location: /admin/admin.php");
            }else{
                return "Username or Password do not match";
            }
        }
        return true;
    }

}






?>
