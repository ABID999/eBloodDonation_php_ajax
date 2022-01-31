<?php
session_start();
include_once 'Crud.php';
$crud = new Crud();
if(!isset($_SESSION['email'])){
	header('location:registration.php');
}

$user_email = $_SESSION['email'];
$user_name = $_SESSION['name'];

if (isset($_POST['rsubmit'])) {
  $pname = $_POST['pname'];
  $relation = $_POST['relation'];
  $description = $_POST['description'];
  $bgroup = $_POST['bgroup'];
  $quantity = $_POST['quantity'];
  $date = $_POST['date'];
  $hospital = $_POST['hospital'];
  $haddress = $_POST['haddress'];
  $division = $_POST['division'];

  $result = $crud->execute("insert into blood_requests values('$user_name','$user_email','$pname','$relation','$description','$bgroup',$quantity,'$date','$hospital','$haddress','$division','')");

  if($result){
           echo '<div class="alert alert-primary" role="alert">Your blood request is submitted successfully </div>';
  }else{
           echo '<div class="alert alert-primary" role="alert">Something went wrong. Please try again</div>';
  }
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
                        <a class="nav-link" href="profile.php">Profile</a>
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

          <section class="container request-section">

            <h2>Request Blood</h2>
            <form action="user.php" method="POST">
                <div class="row">
                  <div class="col">
                    <label for="pname">Patient name</label>
                    <input name="pname" type="text" class="form-control" placeholder="Patient name">
                    <label for="relation">Relation with patient</label>
                    <input name="relation" type="text" class="form-control" placeholder="e.g. Uncle">
                    <label for="description">Describe patient condition</label>
                    <textarea name="description" class="form-control" id="Description" rows="2"></textarea>

                  </div>
                  <div class="col">
                        <label for="text">Blood group of patient</label>
                        <select name="bgroup" class="form-control" id="exampleFormControlSelect1">
                                <option>A+</option>
                                <option>A-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                        </select>
                        <label for="quantity">Total bags of blood needed</label>
                        <input name="quantity" type="number" class="form-control" placeholder="e.g. 1-5">
                        <label for="date">Date of donation</label>
                        <input name="date" type="date" class="form-control" >
                  </div>
                  <div class="col">
                    <label for="hospital">Hospital name</label>
                    <input name="hospital" type="text" class="form-control" placeholder="Hospital name">
                    <label for="text">Hospital Address</label>
                    <input name="haddress" type="text" class="form-control" placeholder="Hospital adress">
                    <label for="division">Division</label>
                    <select name="division" class="form-control" id="exampleFormControlSelect1">
                            <option>Dhaka</option>
                            <option>Barisal</option>
                            <option>Chattagram</option>
                            <option>Khulna</option>
                            <option>Mymensingh</option>
                            <option>Rajshahi</option>
                            <option>Noakhali</option>
                    </select>
                  </div>
                </div>
               
                <button name="rsubmit" type="submit" class="btn btn-primary">Submit blood request</button>
                
              </form>
            </section>

              <div class="container">
                  <div class="row">
                        <div class="requests col-sm-6 m-3">

                                <h4 class="text-center my-3">Requests acording to your blood group</h4>
                          <?php 


    $query2 = "select * from blood_requests order by date asc";
  
    $result2 = $crud->getData($query2);
  if($result2) {
      foreach($result2 as $res2){

          echo '<div class="request"><p class="name">'.$res2["patient_name"].'</p><h1 class="group ">'.$res2['bgroup'].'</h1><p class="location"> || '.$res2['hospital_name'].'</p><p style="display:block;"></p><p class="quantity">Quant : '.$res2['quantity'].' Bag ||</p><p class="date">Date : '.$res2['date'].'</p></div>';
          
      }

    }else{
      echo 'Could not reach database';
    }
  
  

                          ?>
                          <!--
                                <div class="request">
                                  <p class="name">Md Ashfakur Rahman</p>
                                  <h1 class="group ">A+</h1>
                                  <p class="location"> || Dhaka</p>
                                  <p style="display:block;"></p>
                                  <p class="quantity">Quant : 1 Bag ||</p>
                                  <p class="date">Date : 12/8/19</p>
                                </div>
                                -->
                                <button class="btn btn-primary">See other requests</button>
                              </div> 
                  </div>
              </div>











          <script src="http://code.jquery.com/jquery.js"></script>
          <script src="js/bootstrap.min.js"></script>
        </body>
      </html>