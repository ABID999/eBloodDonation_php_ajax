<?php 
  session_start();
  include_once 'Crud.php';
  $crud = new Crud();

/* --------Registration code ------ */

  if (isset($_POST['regBtn'])) {
    $name = $_POST['name'];
    $bgroup = $_POST['bgroup'];
    $dob = $_POST['dob'];
    $division = $_POST['division'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $crud->execute("Insert into user_info(email,name,dob,bgroup,division,phone,password) Values('$email','$name','$dob','$bgroup','$division','$phone','$password')");

    if($result){
       			echo "Registration Successful . Now you can login with your email and password";
    }else{
       			echo "Something went wrong. Please try again.";
    }
  }

  if(isset($_POST['log-btn'])){
   
    $email2 = $_POST['log-email'];
    $password2 = $_POST['log-password'];
    
    
    $query = "select * from user_info where email='$email2' AND password='$password2'";
  
    $result = $crud->getData($query);
  if($result) {
      foreach($result as $res){
          $name= $res['name'];
          $email = $res['email'];
          
      }
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;
      
      header("Location:user.php");
    }else{
      echo '<div class="alert alert-danger" role="alert">Wrong username or password</div>';
    }
  
  
  
 }
	
	

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    </head>
    <body id="regBody">
        
        <section class="form-body">
            <div class="form-header">
                    <ul class="nav nav-tabs">
                      <li class="nav-item">
                        <a id="log-nav" class="nav-link  active" onclick="hideReg()" href="#">Login</a>
                      </li>
                                  <li class="nav-item">
                                    <a id="reg-nav" class="nav-link" onclick="hideLogin()" href="#">Registration</a>
                                  </li>
                    </ul>
            </div>

            <div class="registration" id="registration">
                <h3 class="text-center">eBloodDonation</h3>
                    <form method="POST" action="registration.php">
                            
                              <label class="mt-2" >Your full name</label>
                              <input name="name" type="text" class="form-control"   placeholder="Enter name" required>

                              
                              <label for="text">Blood group</label>
                              <select name="bgroup" class="form-control" id="exampleFormControlSelect1">
                                <option>A+</option>
                                <option>A-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                              </select>
                              
                              <label >Date of birth</label>
                              <input name="dob" type="date" class="form-control" required>

                              <label >Division</label>
                              <select name="division" class="form-control" required>
                                  <option>Dhaka</option>
                                  <option>Barisal</option>
                                  <option>Chattagram</option>
                                  <option>Khulna</option>
                                  <option>Mymensingh</option>
                                  <option>Rajshahi</option>
                                  <option>Noakhali</option>
                                </select>
                            
                              <label>Phone number</label>
                              <input name="phone" type="text" class="form-control"   placeholder="Enter your phone number" required>

                              <label >Enter your emil address</label>
                              <input name="email" type="email" class="form-control"   placeholder="Enter email" required>
                            
                            
                              <label >Chose a Password</label>
                              <input name="password" type="password" class="form-control"  placeholder="Password" required>
                          
                            <button name="regBtn" type="submit" class="btn btn-success mt-3">Submit</button>
                    </form>
            </div>
            <div class="login" id="login">
                <h3 class="text-center my-2">eBloodDonation</h3>
                    <form action="registration.php" method="POST">
                            
                                    
                                      <label  class="mt-2" >Email address</label>
                                      <input  name="log-email" type="email" class="form-control"   placeholder="Enter email" required>
                                      
                                    
                                      <label >Password</label>
                                      <input name="log-password" type="password" class="form-control"  placeholder="Password" required>
                                    
                                    <!-- <div class="form-group form-check">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
                                    </div> -->
                                    <button name="log-btn" type="submit" class="btn btn-primary m-4">Login</button>
                                    <button class="btn btn-danger m-4">Forgot password !</button>
                                 
                    </form>
            </div>

        </section>



    <script src="http://code.jquery.com/jquery.js"></script>        <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
    function hideLogin(){
        document.getElementById('reg-nav').classList.toggle('active');
        document.getElementById('log-nav').classList.toggle('active');
        document.getElementById('login').style.display='none';
        document.getElementById('registration').style.display='block';
    }
    function hideReg(){
      document.getElementById('reg-nav').classList.toggle('active');
      document.getElementById('log-nav').classList.toggle('active');
        document.getElementById('login').style.display='block';
        document.getElementById('registration').style.display='none';
    }
    hideReg();
    
    
    </script>
</body>
</html>