<head>
<body>
<form action = 'updateQuantityT.php' method = 'post'>
	<p>
			<label for="productNumber">Product Number to Update:</label>
			<input type="text" name="productNumber" id="productNumber">
	</p>
	<p>
			<label for="quantity">New Quantity:</label>
			<input type="text" name="newQuantity" id="newQuantity">
	</p>
	<input type="submit" value="Update">
</form>
</body>
</head>

<?php
// This block is the thing that actually inserts the text values.
$conn = mysqli_connect("localhost", "root", "Datanauts2020", "radclothing");
 
// Check connection.
if($conn->connect_error){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// User inputs.
$newQuantity = mysqli_real_escape_string($conn, $_POST['newQuantity']);
$pNum = mysqli_real_escape_string($conn, $_POST['productNumber']);



$sql = "UPDATE RADClothing.Top SET quantity = '$newQuantity' WHERE productNumber = '$pNum'";

if(mysqli_query($conn, $sql) and $newQuantity!= null){
	$result = $conn->query($sql);
    header("Location: /top.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$conn->close();