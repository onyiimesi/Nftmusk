<?php
/**
 * Session Class
 */

 ob_start();

class Session{
    public static function init(){
        session_start();
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } else{
            return false;
        }
    }


    public static function checkSession(){
        self::init();
        if(self::get("UserLogin") == false){
            self::destroy();
            header("Location: /");
        }
    }


    public static function checkSessions(){
        self::init();
        if(self::get("adminlogin") == false){
            self::destroy();
            header("Location: /admin/login.php");
        }
    }


    public static function checkLogin(){
        self::init();
        if(self::get("UserLogin") == true){
            header("Location: /dashboard/home");
        }
    }

    public static function checAdminkLogin(){
        self::init();
        if(self::get("adminlogin") == true){
            header("Location: /admin/admin.php");
        }
    }



    public static function destroy(){
        session_destroy();
        header("Location: /");
    }
}


?>
