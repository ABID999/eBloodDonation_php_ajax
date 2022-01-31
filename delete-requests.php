<?php

	include_once 'crud.php';
	
	$crud = new crud();
	
	$id = (int)$_POST['id'];
	
	if($crud->delete($id,"blood_requests")){
		echo 'success';
	}else{
        echo 'failed';
    }


?>