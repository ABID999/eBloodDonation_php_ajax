
  <?php 
 session_start();

 include_once 'Crud.php';
 
 $crud = new Crud();
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
     echo "Login Problem";
 }
 
 
 
}



  /*
  session_start();

	include_once 'Crud.php';
	
	$crud = new Crud();
  if(isset($_POST['submit'])){
	  
	  $email = $_POST['email'];
	  $password = md5($_POST['password']);
	  
	  
	  $query = "select * from user where email='$email' AND password='$password'";
	
	  $result = $crud->getData($query);
	if($result) {
		foreach($result as $res){
			$email = $res['email'];
			$name = $res['name'];
		}
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $name;
		header("Location:index.php");
	}else{
		echo "Login Problem";
	}
	
	
	
  }





   session_start();
  include_once 'Crud.php';
  $crud = new Crud();
  
  
  if (isset($_POST['log-Btn'])) {
    $email = $_POST['log-email'];
    $password = $_POST['log-password'];

    $result = $crud->getData("select * from user_info where email='$email' and password='$password'");

    if(mysqli_num_rows($results) == 1) {
      echo "login successful";
      
      foreach($result as $res){
        $email = $res['email'];
        $name = $res['name'];
      }
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;
      header("Location:user.html");
      
    }else{
        echo "Incorrect email or password";
      }
  
  */

  ?>