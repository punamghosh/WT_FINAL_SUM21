<?php
    include 'models/db_config.php';
    
    $username="";
    $err_username="";
    $pass="";
    $err_pass="";
    $err_db="";

    $hasError=false;

    
    if(isset($_POST["log_in"])){
        if(empty($_POST["username"])){
            $hasError=true;
            $err_username="Username Required";
        }
        else{
            $username=$_POST["username"];
        }
        if(empty($_POST["pass"])){
            $hasError=true;
            $err_pass="Password Required";
        }
        else{
            $pass=$_POST["pass"];
        }
        if(!$hasError){
            if(authenticateUser($username,$pass)){
                header("location:dashboard.php");
            }
            $err_db="Username and Password invalid";
        }
    }

    function authenticateUser($username,$pass){
        $query = "select * from users where username='$username' and pass='$pass'";
        echo $query;
        $rs = get($query);
        if(count($rs) > 0) {
            return true;
        }
        return false;
    }
?>