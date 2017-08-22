<!DOCTYPE html>
<html>
<head>
	<title>TRACKING</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="logo.png" type="image" sizes="16x16">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#popUpWindow').modal('show');
        $('.modal-backdrop').remove();

    });

    $('#popUpWindow').submit(function() {

    // submission stuff

    $('#popUpWindow').modal('hide');
    return false;
});
</script>
<body>

<div class="container">
    <div class="modal fade in" id="popUpWindow">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">TRACK OUR COMPLAINT</h3>
                </div>

                <!-- body (form) -->
                <div class="modal-body">
                    
                        <div class="form-group">
                            <input type="name" name="comp_id" class="form-control" placeholder="COMPLAINT-ID" required>
                        </div>

                </div>

                <!-- button -->
                <div class="modal-footer">
                    <!-- <submit type="submit" class="btn btn-primary btn-block" >Submit</button> -->
                    <input class="btn btn-primary " type="submit" name="submit" value="SUBMIT" data-toggle="modal">
                    <input class="btn btn-primary " type="submit" name="close" value="CLOSE" data-dismiss="modal">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container"><h2>Your Complaint Details</h2>
        <div class="col-sm-12 form-group">
        <a class="btn btn-default pull-right" type="submit" href="index.php" value="Back" >Back</a>
    </div>
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
// else echo "connected";

if ($_SERVER["REQUEST_METHOD"] == "POST" ) 
{
  $comp_id = $_POST["comp_id"];

}

$sql="SELECT * FROM complaints WHERE comp_id='$comp_id'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
    echo '<div class="container alert alert-success">';
        echo $row['name'];
        echo " Your complaint was successfully registered";
    echo '</div>';
    echo '<div class="container alert alert-warning">';
        echo "Your complaint -Id is :::";
    echo $row['comp_id'];
    echo '</div>';
    echo '<div class="container alert alert-danger">';
        echo "Your complaint is :::";
    echo $row['complaint'];
    echo '</div>';
    
    
}
$sql = "SELECT msg ,name FROM track WHERE comp_id='$comp_id'";
    $result = mysqli_query($conn,$sql);
    $i=0001;
    if(mysqli_num_rows($result) > 0)
        {
            echo '<div class="container"><h3>Your Messages</h2></div>';
            while($row = mysqli_fetch_assoc($result))
            {
                echo '<div class="container alert alert-info"><blockquote>';
                echo $i.') ';$i+=1;
                echo $row['msg'];
                echo '<footer>'.$row['name'].'</footer>';
                echo '</blockquote></div>';
            }
              // echo '</div>';
        }

?>
</body>
</html>