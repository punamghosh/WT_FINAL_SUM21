<?php
	$db_server="localhost";
	$db_username="root";
	$db_pass="";
	$db_name="lab_task_final";

	
	
    //responsible for running insert,update,delete
	function execute($query){   
		global $db_server,$db_username,$db_pass,$db_name;
		$conn=mysqli_connect($db_server,$db_username,$db_pass,$db_name);
		if($conn){
			if(mysqli_query($conn,$query)){
				return true;
			}
			else{
				return mysqli_error($conn);
			}
		}
	}
	

    //responsible for running select queires
	function get($query){ 
		global $db_server,$db_username,$db_pass,$db_name;
		$conn = mysqli_connect($db_server,$db_username,$db_pass,$db_name);
		$data = array();
		if($conn){
			$result = mysqli_query($conn,$query);
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
		}
		return $data;
	}
?>