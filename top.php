<html>

<h1 style="text-align:center">RAD Clothing: Tops</h1>

<head>
<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
</style>
</head>

<body>

<h1>Tops</h1>
<p>This is a paragraph.</p>

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


</body>

</html>




</head>
<body>
<form action="top.php" method="post">
    <p>
        <label for="productNumber">Insert Product Number:</label>
        <input type="text" name="productNumber" id="productNumber">
    </p>
    <p>
        <label for="brand">Insert Brand Name:</label>
        <input type="text" name="brand" id="brand">
    </p>
	 <p>
        <label for="gender">Insert Gender:</label>
        <input type="text" name="gender" id="gender">
    </p>
	<p>
        <label for="topType">Insert Type of Top:</label>
        <input type="text" name="topType" id="topType">
    </p>
	<p>
        <label for="size">Insert Size:</label>
        <input type="text" name="size" id="size">
    </p>
	<p>
        <label for="color">Insert Color:</label>
        <input type="text" name="color" id="color">
    </p>
	<p>
        <label for="price">Insert Price:</label>
        <input type="text" name="price" id="price">
    </p>
	<p>
        <label for="quantity">Insert Quantity:</label>
        <input type="text" name="quantity" id="quantity">
    </p>
    <input type="submit" value="Submit">
</form>
<li><a href = 'updatePriceT.php'>Update Price</a></li>
<li><a href = 'updateQuantityT.php'>Update Quantity</a><l/li>

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
$clothingType = 'Top';
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$topType = mysqli_real_escape_string($link, $_REQUEST['topType']);
$size = mysqli_real_escape_string($link, $_REQUEST['size']);
$color = mysqli_real_escape_string($link, $_REQUEST['color']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$quantity = mysqli_real_escape_string($link, $_POST['quantity']);
 
// Insertion command in SQL.
$sql = "INSERT INTO RADClothing.Product (productNumber, brand, clothingType, gender) VALUES ('$productNumber', '$brand', '$clothingType', '$gender')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "INSERT INTO RADClothing.Top (productNumber, topType, size, color, price, quantity) VALUES ('$productNumber', '$topType', '$size', '$color', '$price', '$quantity')";
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
<th>Top Type</th>
<th>Size</th>
<th>Color</th>
<th>Price</th>
<th>Quantity</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "Datanauts2020", "radclothing");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT productNumber, topType, size, color, price, quantity FROM RADClothing.Top";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		echo "<td>".$row["productNumber"]. "</td>";
		echo "<td>".$row["topType"]. "</td>";
		echo "<td>".$row["size"]. "</td>";
		echo "<td>".$row["color"]. "</td>";
		echo "<td>".$row["price"]. "</td>";
		echo "<td>".$row["quantity"]. "</td>";
		echo "<td><a href='deleteT.php?pNum=".$row["productNumber"]."'>Delete</a></td>";
		echo "</tr>";
	}
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>