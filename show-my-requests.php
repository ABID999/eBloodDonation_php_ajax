<?php 
session_start();
include_once 'Crud.php';
$crud = new Crud();
$user_email = $_SESSION['email'];
$sorting = $_POST['sort'];
// $sorting
$query = "select * from blood_requests where user_email='$user_email'";

$result = $crud->getData($query);

echo '<table class="table table-hover"><thead class="table-success"><tr><th>Patien name</th><th>Blood group</th><th>Quantity</th><th>Hospital</th><th>Hospital address</th><th>Donation date</th><th>Phone</th><th>Posted by</th><th>Action</th></tr><thead>';
if($result) {
  foreach($result as $res){
    $id=$res['id'];

    echo ' <tr><td>'.$res["patient_name"].'</td><td>'.$res["bgroup"].'</td><td>'.$res["quantity"].'</td><td>'.$res["hospital_name"].'</td><td>'.$res["hospital_adress"].', '.$res["division"].'</td><td>'.$res["date"].'</td><td>'.$res["date"].'</td><td>'.$res["date"].'</td><td><button id="'.$id.'" class="delete-btn">Delete</button></td></tr>';
        
}

}else{
  echo '<h3>Could not reach database</h3>';
}
echo '</table>';





?>

<script>

$('.delete-btn').click(function(){
                console.log('hello');
                var id = $(this).attr("id");
                console.log(id);
                $.ajax({
			  	      url:'delete-requests.php',
			  	      type:'POST',
			      	  data:{id:id},
				        success:function(response){
                  if(response=='success'){
                    $('#delete-msg').html('<div class="alert alert-success">Deleted successfully</div>');
                  }else{
                    console.log('deletion failed');
                  }
			  	      }
			          });
              });
             



</script>