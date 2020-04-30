<?php
echo "Today is: " . date("Y-m-d") . "<br>";
echo "Today is: " . date("l") . "<br>";
echo "<br>";
date_default_timezone_set("America/Chicago");
echo "The time is " . date("h:i:sa");
?>


<html>

<h1 style="text-align:center">RAD Clothing: Product</h1>

<head>
<style>
body {background-color: MintCream;}
h1   {color: black;}
p    {color: black;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
</style>
</head>

<body>

<h1>Products</h1>
<p>Here is a list of all of the avaliable products in our store.</p>

</body>


<nav>
  <ul>
	<li><a href="test2.php">Home</a></li>
	<li><a href="product.php">Product</a></li>
    <li><a href="top.php">Tops</a></li>
    <li><a href="bottom.php">Bottoms</a></li>
    <li><a href="interior.php">Interiors</a></li>
    <li><a href="accessory.php">Accessories</a></li>
  </ul>
</nav>

</html>

</head>
<body>
<form action="product.php" method="post">
    <p>
        <label for="productNumber">Insert Product Number:</label>
        <input type="text" name="productNumber" id="productNumber">
    </p>
    <p>
        <label for="brand">Insert Brand Name:</label>
        <input type="text" name="brand" id="brand">
    </p>
    <p>
        <label for="clothingType">Insert Clothing Type:</label>
        <input type="text" name="clothingType" id="clothingType">
    </p>
	 <p>
        <label for="gender">Insert Gender:</label>
        <input type="text" name="gender" id="gender">
    </p>
    <input type="submit" value="Submit">
</form>


</body>
</html>



<?php
// This block is the thing that actually inserts the text values.
$link = mysqli_connect("localhost", "root", "Datanauts2020", "radclothing");
 
// Check connection.
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// User inputs.
$productNumber = mysqli_real_escape_string($link, $_REQUEST['productNumber']);
$brand = mysqli_real_escape_string($link, $_REQUEST['brand']);
$clothingType = mysqli_real_escape_string($link, $_REQUEST['clothingType']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
 
// Insertion command in SQL.
$sql = "INSERT INTO RADClothing.Product (productNumber, brand, clothingType, gender) VALUES ('$productNumber', '$brand', '$clothingType', '$gender')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection.
mysqli_close($link);
?>




<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Product Number</th>
<th>Brand</th>
<th>Clothing Type</th>
<th>Gender</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "Datanauts2020", "RADClothing");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT productNumber, brand, clothingType, gender FROM RADClothing.Product";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	echo "<tr>";
		echo "<td>".$row["productNumber"]. "</td>";
		echo "<td>".$row["brand"]. "</td>";
		echo "<td>".$row["clothingType"]. "</td>";
		echo "<td>".$row["gender"]. "</td>";
		echo "<td><a href='deleteP.php?pNum=".$row["productNumber"]."'>Delete</a></td>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>