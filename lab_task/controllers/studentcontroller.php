<?php
	require_once 'models/db_config.php';
	$name="";
	$err_name="";
	$dateof_birth="";
	$err_dateof_birth="";
	$credit="";
	$err_credit="";
	$cgpa="";
	$err_cgpa="";
	$dept_name="";
	$err_dept_name="";
	
	$err_db="";
	$hasError=false;

	if(isset($_POST["add_student"])){
		//Validation
		if(empty($_POST["name"])){
            $hasError=true;
            $err_name="*Name Required";
        }
        else{
            $name=$_POST["name"];
        }
		if(empty($_POST["dateof_birth"])){
            $hasError=true;
            $err_dateof_birth="*Date of Birth Required";
        }
        else{
            $dateof_birth=$_POST["dateof_birth"];
        }
		if(empty($_POST["credit"])){
            $hasError=true;
            $err_credit="*Credit Required";
        }
        else{
            $credit=$_POST["credit"];
        }
		if(empty($_POST["cgpa"])){
            $hasError=true;
            $err_cgpa="*CGPA Required";
        }
        else{
            $cgpa=$_POST["cgpa"];
        }
		if(empty($_POST["dept_name"])){
            $hasError=true;
            $err_dept_name="*Dept name Required";
        }
        else{
            $dept_name=$_POST["dept_name"];
        }
		//if no error
		$rs = insertStudent($name,$dateof_birth,$credit,$cgpa,$dept_name);
		if($rs === true){
			header("Location: Allstudent.php");
		}
		$err_db = $rs;
		
	}
	elseif (isset($_POST["edit_student"])){
		//Validation
		if(empty($_POST["name"])){
            $hasError=true;
            $err_name="*Name Required";
        }
        else{
            $name=$_POST["name"];
        }
		if(empty($_POST["dateof_birth"])){
            $hasError=true;
            $err_dateof_birth="*Date of Birth Required";
        }
        else{
            $dateof_birth=$_POST["dateof_birth"];
        }
		if(empty($_POST["credit"])){
            $hasError=true;
            $err_credit="*Credit Required";
        }
        else{
            $credit=$_POST["credit"];
        }
		if(empty($_POST["cgpa"])){
            $hasError=true;
            $err_cgpa="*CGPA Required";
        }
        else{
            $cgpa=$_POST["cgpa"];
        }
		if(empty($_POST["dept_name"])){
            $hasError=true;
            $err_dept_name="*Dept name Required";
        }
        else{
            $dept_name=$_POST["dept_name"];
        }
		//if no error
		$rs=updateStudent($id,$name,$dateof_birth,$credit,$cgpa,$dept_name);
		if($rs === true){
			header("Location: Allstudent.php");
		}
		$err_db =$rs;
	}
	
	function insertStudent($name,$dateof_birth,$credit,$cgpa,$dept_name){
		$query="insert into students values (NULL,'$name','$dateof_birth','$credit','$cgpa','$dept_name')";
		return execute($query);
	}
	
	function getAllstudents(){
		$query = "select * from students";
		$rs = get($query);
		return $rs;
	}
	function getStudent($id){
		$query = "select * from students where id = $id";
		$rs = get($query);
		return $rs[0];	
	}
	function updateStudent($id,$name,$dateof_birth,$credit,$cgpa,$dept_name)
	{
		$query = "update students set name='$name', dateof_birth='$dateof_birth', credit='$credit', cgpa='$cgpa', dept_name='$dept_name' where id = $id";
		return execute($query);
	}

?>