<?php
$servername = "localhost";
$username = "id2637636_root";
$password = "giggle";
$dbname = "id2637636_doorstep";
$comp_id=$name=$complaint=$address=$email=$phone=$board='';
	
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$comp_id= $_POST["comp_id"];
	$reply= $_POST["reply"];
	$name= $_POST["name"];
	$sql = "insert into track values ('$comp_id','$reply','$name')";
	if ($conn->query($sql) === TRUE) {
    // echo "New complaint recorded successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	$conn->close();
?>
<!-- <a href="gov.php" isclicked>link text</a>  -->
<script type="text/javascript">
	window.location.href = "gov.php";
</script>