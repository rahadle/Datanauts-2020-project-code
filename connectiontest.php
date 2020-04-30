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
<th> Color</th>
<th> Price </th>
<th> Quantity </th>
<li><a href = 'updatePriceT.php'>Update Price</a></li>
<li><a href = 'updateQuantityT.php'>Update Quantity</a><l/li>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "Datanauts2020", "radclothing");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM RADClothing.Top";

$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
	// output data of each row
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
else { echo "0 results"; }




$conn->close();
?>
</table>
</body>
</html>