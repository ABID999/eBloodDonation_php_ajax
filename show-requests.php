<?php 

include_once 'Crud.php';
$crud = new Crud();

$sorting = $_POST['sort'];
// $sorting
$query = "select * from blood_requests order by ".$sorting." asc";
  
$result = $crud->getData($query);
echo '<table class="table table-hover"><thead class="table-success"><tr><th>Patien name</th><th>Blood group</th><th>Quantity</th><th>Hospital</th><th>Hospital address</th><th>Donation date</th><th>Phone</th><th>Posted by</th></tr><thead>';
if($result) {
  foreach($result as $res){


    echo ' <tr><td>'.$res["patient_name"].'</td><td>'.$res["bgroup"].'</td><td>'.$res["quantity"].'</td><td>'.$res["hospital_name"].'</td><td>'.$res["hospital_adress"].', '.$res["division"].'</td><td>'.$res["date"].'</td><td>'.$res["date"].'</td><td>'.$res["date"].'</td></tr>';
        
}

}else{
  echo '<h3>Could not reach database</h3>';
}
echo '</table>';





?>
<!-- 
<table>
    <tr>
        <th>Patien name</th>
        <th>Blood group</th>
        <th>Quantity</th>
        <th>Hospital</th>
        <th>Hospital address</th>
        <th>Donation date</th>
        <th>Phone</th>
        <th>POsted by</th>
    </tr>
    <tr>
        <td>'.$res["patient_name"].'</td>
        <td>'.$res["bgroup"].'</td>
        <td>'.$res["quantity"].'</td>
        <td>'.$res["hospital_name"].'</td>
        <td>'.$res["hospital_adress"].', '$res["division"].'</td>
        <td>'.$res["date"].'</td>
        <td>'$res["date"].''</td>
        <td>'.$res["date"].'</td>
    </tr>
</table> -->

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