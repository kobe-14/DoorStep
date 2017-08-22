<!-- <?php
    echo '<script>parent.window.location.reload(true);</script>';
?> -->

<!DOCTYPE html>
<html>
<head>
	<title>TRACKING</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="logo.png" type="image" sizes="16x16">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container"><h2>Complaint Details</h2>
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
// else echo "connected";

if ($_SERVER["REQUEST_METHOD"] == "POST" ) 
{
  $comp_id = $_POST["comp_id"];
  $name= $_POST["name"];
}

$sql="SELECT * FROM complaints WHERE comp_id='$comp_id'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{

    echo '<div class="container alert alert-success">';
        echo "Your complaint -Id is :::";
    echo $row['comp_id'];
    echo '</div>';
    echo '<div class="container alert alert-success">';
        echo "Your complaint is :::";
    echo $row['complaint'];
    echo '</div>';          
}
?>
  <button type="button" class="col-sm-12 btn btn-default" data-toggle="collapse" data-target="#mesg">View Previous Messages</button></br></br>
  <div id="mesg" class="collapse">
<?php
$sql = "SELECT msg ,name FROM track WHERE comp_id='$comp_id'";

    $result = mysqli_query($conn,$sql);
    $i=1;
    if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo '<div class="container alert alert-info"><blockquote>';
                echo $i.') ';$i+=1;
                echo $row['msg'];
                echo '<footer>'.$row['name'].'</footer>';
                echo '</blockquote></div>';
            }
        }

?>
</div>

<form method="post" action="save.php">
<textarea class="form-control" id="reply" name="reply" placeholder="Write Your Reply Here" rows="5" required></textarea>
<div class="col-sm-2 form-group">
          <input class="form-control" id="name" name="name" value="<?php echo $name;?>" placeholder="Name" type="hidden" required >
        </div>
        <div class="col-sm-2 form-group">
          <input class="form-control" id="comp_id" name="comp_id" value="<?php echo $comp_id;?>" placeholder="comp_id" type="hidden" required>
        </div>
	<div class="col-sm-8 form-group">
        <input class="btn btn-default pull-right" type="submit" name="submit" value="SUBMIT" >
    </div>
</form>

</div>
</body>
</html>