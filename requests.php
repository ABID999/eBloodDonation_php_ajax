<?php
session_start();
include_once 'Crud.php';
$crud = new Crud();
if(!isset($_SESSION['email'])){
	header('location:registration.php');
}

$user_email = $_SESSION['email'];
$user_name = $_SESSION['name'];



?>




<!DOCTYPE html>
<html lang="en">
    <head>
    <title>User - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    </head>
    <body class="user-body">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
            <a class="navbar-brand" href="#">eBloodDonation</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Blood requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Browse donars</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
              
                        <a class="nav-link" href="#"><?php echo $user_name ?></a>
              
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Language
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item active" href="#">Enlish</a>
                      <a class="dropdown-item" href="#">Bangla</a>
                    </div>
                  </div>
              </form>
            </div>
            </div>
          </nav>

    <div class="header">
        <h2 class="text-center mt-4">List of blood requests</h2>
        
        Sort by
        <select name="division"  id="selectbox">
                            <option value="patient_name">Patient name</option>
                            <option value="date">Donation date</option>
                            <option value="bgroup">Blood group</option>
                            <option value="hospital_name">Hospital</option>

        </select>
       

    </div>
    <section id="requests-section" class="container">
        

    </section>



    

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
   

    $(document).ready(function(){
        
        // $.get("show-requests.php", function(data){
        //     // Display the returned data in browser
        //     $("#requests-section").html(data);
        // });
        var e = document.getElementById("selectbox");
        var sortingElement = e.options[e.selectedIndex].value;
        function loadTable(){
          var e = document.getElementById("selectbox");
          var sortingElement = e.options[e.selectedIndex].value;
          $.ajax({
			  	url:'show-requests.php',
			  	type:'POST',
			  	data:{sort:sortingElement},
				  success:function(response){
					  $('#requests-section').html(response);
			  	}
			    });
        }
        loadTable();
        e.onchange=function(){
          console.log('hello');
          // document.getElementById('requests-section').innerHTML=';
          loadTable()
        }

       
      
      

    });
    </script>
    </body>
</html>