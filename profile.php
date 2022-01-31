<?php
session_start();
include_once 'Crud.php';
$crud = new Crud();
if(!isset($_SESSION['email'])){
	header('location:registration.php');
}
$user_email = $_SESSION['email'];
$user_name = $_SESSION['name'];

$query = "select * from user_info where email='$user_email'";
$result = $crud->getData($query);
    if($result) {
      foreach($result as $res){
        $name = $res['name'];
        $bgroup = $res['bgroup'];
        $dob = $res['dob'];
        $division = $res['division'];
        $phone = $res['phone'];
        $ldod = $res['ldod'];
        $total_donation = $res['total_donation'];
        
        
          
        }
      }else{
        echo 'DB connection error';
      }

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
                  <a class="nav-link" href="requests.php">Blood requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Browse donars</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link disabled" href="#">Profile</a>
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

        <section class="profile container mt-5">
        
            <div class="row">

                <div class="col-sm-8">
                    <h1 class="profile-infos"> Name           :   <?php echo $name ?></h1>
                    <label class="hide">Name</label>
                    <input id="name" class="hide" type="text" value="<?php echo $name ?>">
                    <hr>
                    <h1 class="profile-infos"> Blood group    :   <?php echo $bgroup ?></h1>
                    <label class="hide">Blood group</label>
                    <input id="bgroup" class="hide" type="text" value="<?php echo $bgroup ?>">
                    <hr>
                    <p > Email   :   <?php echo $user_email ?></p>
                    <hr>
                    <p class="profile-infos"> Date of birth   :   <?php echo $dob ?></p>
                    <label class="hide">Date of birth</label>
                    <input id="dob" class="hide" type="date" value="<?php echo $dob ?>">
                    <hr>
                    <p class="profile-infos"> Phone       :   <?php echo $phone ?></p>
                    <label class="hide">Phone</label>
                    <input id="phone" class="hide" type="text" value="<?php echo $phone ?>">
                    <hr>
                    <p class="profile-infos"> Division   :   <?php echo $division ?></p>
                    <label class="hide">Division</label>
                    <input id="division" class="hide" type="text" value="<?php echo $division ?>">
                    <hr>
                    <p class="profile-infos"> Last date of blood dontaion    :   <?php echo $ldod ?></p>
                    <label class="hide">Last date of blood dontaion </label>
                    <input id="ldod" class="hide" type="date" value="<?php echo $ldod ?>">
                    <hr>
                    <p class="profile-infos"> Total blood donated   :   <?php echo $total_donation ?></p>
                    <label class="hide">Total blood donated</label>
                    <input id="td" class="hide" type="number" value="<?php echo $total_donation ?>">
                    <hr>
                </div>
                <div class="col-sm-4">
                  <img src="images/nia.jpg" alt="No image found">
                  <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <button id="update-btn" class="hide btn btn-md btn-success mx-3">Update Profile</button>
                <button class="btn btn-lg btn-danger mx-3">Edit Profile</button>

            </div>

            <div id="msg"></div>
            <div id="delete-msg">

            
</div>
            <div id="delete-section">

            
            </div>

        
      
        </section>

          <script src="http://code.jquery.com/jquery.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script>
         
              $(document).ready(function(){
                
                $('#update-btn').click(function(){

                var name = $('#name').val();
                var bgroup = $('#bgroup').val();
                var dob= $('#dob').val();
                var phone = $('#phone').val();
                var division = $('#division').val();
                var ldod = $('#ldod').val();
                var td = $('#td').val();
                console.log(name,bgroup,dob,phone,division,ldod,td);
                $.ajax({
                url:'update-profile.php',
                type:'POST',
                data:{name:name,bgroup:bgroup,dob:dob,phone:phone,ldod:ldod,td:td,division:division},
                success:function(response){
                  // if(response =='success'){
                  //   $('#msg').html('<div class="alert alert-success">Profile updated successfully</div>');
                  // }else{
                  //   $('#msg').html('<div class="alert alert-danger">Error !! Could not update profile.</div>');
                  // }
                  $('#msg').html(response);
                }
                });
              });




              // Show my requests

              $.ajax({
			  	    url:'show-my-requests.php',
			  	    type:'POST',
			      	data:{sort:'xyz'},
				      success:function(response){
					    $('#delete-section').html(response);
			  	    }
			        });




              // Request delete 


  });
          
          </script>
        </body>
      </html>