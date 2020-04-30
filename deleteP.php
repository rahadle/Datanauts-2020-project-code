<?php 
$conn = mysqli_connect("localhost", "root", "Datanauts2020", "radclothing");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$pNum = $_GET['pNum'];

if(empty($pNum))
{
	die('productNumber does not exist');
}

$sql = "Delete from RADCLothing.product WHERE productNumber = $pNum";
$result = $conn->query($sql);


header("Location: /product.php");
$conn->close();
?>