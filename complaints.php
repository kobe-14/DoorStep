<?php
$gname= $_POST["name"]; 
$board =$_POST["board"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>TRACKING</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<link rel="icon" href="logo.png" type="image" sizes="16x16">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h3>Your Complaints in <?php echo $board;?> board</h3>
	<form method="post" action="write.php">
	<div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="comp_id" name="comp_id"  placeholder="Complaint-Id" type="text" required>
        </div> 
         <div class="col-sm-6  form-group">
          <input class="form-control" id="name" name="name" value="<?php echo $gname;?>" placeholder="Name" type="text" required>
        </div> 
        <div class="col-sm-12 form-group">
          <input class="btn btn-default pull-right" type="submit" name="submit" value="SUBMIT">
        </div>
      </div>
    </div>
	</form>
</div>


<?php 
$servername = "localhost";
$username = "id2637636_root";
$password = "giggle";
$dbname = "id2637636_doorstep";
$comp_id=$name=$complaint=$address=$email=$phone=$board='';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$gname= $_POST["name"]; 
$board =$_POST["board"];
$sql = "SELECT * FROM complaints WHERE board='$board'";
    $result = mysqli_query($conn,$sql);
    $i=1;
    if(mysqli_num_rows($result) > 0)
        {
            echo '';
            while($row = mysqli_fetch_assoc($result))
            {
                echo '<div class="container alert alert-info"><blockquote>';
                echo $i.') ';$i+=1;
                echo $row['comp_id'].'  - Complaint-Id'.'</br>';
                echo 'Name -'.$row['name'].'</br>';
                echo 'Complaint -'.$row['complaint'].'</br>';
                echo 'Address -'.$row['address'].'</br>';
                echo '<footer>'.$row['phone'].'</footer>';
                echo '<footer>'.$row['email'].'</footer>'; 
                echo '<form method="get" action="write.php">';              
                echo '</div>';
      			echo '</blockquote>';
            }
        }
?>

</html>