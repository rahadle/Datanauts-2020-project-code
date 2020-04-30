<html>
<head>
<title>Search</title>
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
<th>Type</th>
<th>Gender</th>
<th>Color</th>
<th>Size</th>
<th>Price</th>
</tr>
<li><a href="test2.php">Home</a></li>
<form name ="search" action='searchtest.php' method='POST' name='form_filter'>
<b>Search</b><br>
<select name="selectVal" onchange="enabledisabletext()">
<option value="Product">Product</option>
<option value="Top">Top</option>
<option value="Bottom">Bottom</option>
<option value="Interior">Interior</option>
<option value="Accessory">Accessory</option>
</select>
<br><input type='text' name='productNumber' placeholder='Product Number' size='30'><br>
<input type='text' name='brand' placeholder='brand' size='30'><br>
<input type='text' name='type' placeholder='type' size='30'><br>
<input type='text' name='gender' placeholder='gender' size='30'><br>
<input type='text' name='size' placeholder='size' size='30'><br>
<input type='text' name='color' placeholder='color' size='30'><br>
<input type='text' name='minprice' placeholder='minprice' size='30'><br>
<input type='text' name='maxprice' placeholder='maxprice' size='30'><br>
<input type='submit' value='Search'>
</form>
<script language="javascript">
function enabledisabletext(){
	if(document.search.selectVal.value=='Accessory'){
		document.search.productNumber.disabled=false;
		document.search.brand.disabled=false;
		document.search.type.disabled=false;
		document.search.gender.disabled=false;
		document.search.size.disabled=true;
		document.search.color.disabled=false;
		document.search.minprice.disabled=false;
		document.search.maxprice.disabled=false;
	}
	else{
		document.search.productNumber.disabled=false;
		document.search.brand.disabled=false;
		document.search.type.disabled=false;
		document.search.gender.disabled=false;
		document.search.size.disabled=false;
		document.search.color.disabled=false;
		document.search.minprice.disabled=false;
		document.search.maxprice.disabled=false;
	}
}
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "Datanauts2020";
$dbname = "RADClothing";

$con=new mysqli($servername,$username,$password,$dbname);



$productNumber	= isset($_POST['productNumber'])       ? htmlspecialchars(trim($_POST['productNumber']))      : null;
$brand			= isset($_POST['brand'])       ? htmlspecialchars(trim($_POST['brand']))      : null;
$type			= isset($_POST['type'])       ? htmlspecialchars(trim($_POST['type']))      : null;
$gender			= isset($_POST['gender'])       ? htmlspecialchars(trim($_POST['gender']))      : null;
$size			= isset($_POST['size'])       ? htmlspecialchars(trim($_POST['size']))      : null;
$color			= isset($_POST['color'])       ? htmlspecialchars(trim($_POST['color']))      : null;
$minprice		= isset($_POST['minprice'])       ? htmlspecialchars(trim($_POST['minprice']))      : null;
$maxprice		= isset($_POST['maxprice'])       ? htmlspecialchars(trim($_POST['maxprice']))      : null;
$catLocation    = isset($_POST['selectVal'])    ? htmlspecialchars(trim($_POST['selectVal']))   : null;

if($catLocation == "Product"){
	$sql = "select * FROM (Product 
			JOIN Top ON Product.productNumber = Top.productNumber) 
			WHERE Product.productNumber IS NOT NULL ";
	if($productNumber)	$sql .= " AND Product.productNumber LIKE '%".$productNumber."%'";
	if($brand)			$sql .= " AND brand LIKE '%".$brand."%'";
	if($type)			$sql .= " AND clothingType LIKE '%".$type."%'";
	if($gender)			$sql .= " AND gender LIKE '".$gender."%'";
	if($size)			$sql .= " AND size LIKE '%".$size."%'";
	if($color)			$sql .= " AND color LIKE '%".$color."%'";
	if($minprice){
		settype($minprice, "integer");
		$sql .= " AND price >= $minprice";
	}
	if($maxprice){
		settype($maxprice, "integer");
		$sql .= " AND price <= $maxprice";
	}
	$sql .= " UNION
			select * FROM (Product
			JOIN Bottom ON Product.productNumber = Bottom.productNumber) 
			WHERE Product.productNumber IS NOT NULL ";
	if($productNumber)	$sql .= " AND Product.productNumber LIKE '%".$productNumber."%'";
	if($brand)			$sql .= " AND brand LIKE '%".$brand."%'";
	if($type)			$sql .= " AND clothingType LIKE '%".$type."%'";
	if($gender)			$sql .= " AND gender LIKE '".$gender."%'";
	if($size)			$sql .= " AND size LIKE '%".$size."%'";
	if($color)			$sql .= " AND color LIKE '%".$color."%'";
	if($minprice){
		settype($minprice, "integer");
		$sql .= " AND price >= $minprice";
	}
	if($maxprice){
		settype($maxprice, "integer");
		$sql .= " AND price <= $maxprice";
	}
	$sql .= " UNION
			select * FROM (Product
			 JOIN Interior ON Product.productNumber = Interior.productNumber) 
			WHERE Product.productNumber IS NOT NULL ";
	if($productNumber)	$sql .= " AND Product.productNumber LIKE '%".$productNumber."%'";
	if($brand)			$sql .= " AND brand LIKE '%".$brand."%'";
	if($type)			$sql .= " AND clothingType LIKE '%".$type."%'";
	if($gender)			$sql .= " AND gender LIKE '".$gender."%'";
	if($size)			$sql .= " AND size LIKE '%".$size."%'";
	if($color)			$sql .= " AND color LIKE '%".$color."%'";
	if($minprice){
		settype($minprice, "integer");
		$sql .= " AND price >= $minprice";
	}
	if($maxprice){
		settype($maxprice, "integer");
		$sql .= " AND price <= $maxprice";
	}
	$sql .= " UNION
		select * FROM (Product
		JOIN Accessory ON Product.productNumber = Accessory.productNumber) 
		WHERE Product.productNumber IS NOT NULL ";
	if($productNumber)	$sql .= " AND Product.productNumber LIKE '%".$productNumber."%'";
	if($brand)			$sql .= " AND brand LIKE '%".$brand."%'";
	if($type)			$sql .= " AND clothingType LIKE '%".$type."%'";
	if($gender)			$sql .= " AND gender LIKE '".$gender."%'";
	if($size)			$sql .= " AND size LIKE '%".$size."%'";
	if($color)			$sql .= " AND color LIKE '%".$color."%'";
	if($minprice){
		settype($minprice, "integer");
		$sql .= " AND price >= $minprice";
	}
	if($maxprice){
		settype($maxprice, "integer");
		$sql .= " AND price <= $maxprice";
	}
	$res=$con->query($sql);
	
	if ($res->num_rows > 0) {
		while($row=$res->fetch_assoc()){
			echo "<tr><td>" . $row["productNumber"]. "</td><td>" . $row["brand"] ."</td><td>" . $row["clothingType"]. 
			"</td><td>" . $row["gender"] . "</td><td>" . $row["color"] . "</td><td>" . $row["size"]. "</td><td>" 
			. $row["price"]. "</td></tr>";
		}
	}
	else { echo "0 results"; }
}
else if($catLocation == "Top"){
	$sql = "select * from Top, Product WHERE Top.productNumber = Product.productNumber ";
	if($productNumber)	$sql .= " AND productNumber LIKE '%".$productNumber."%'";
	if($brand)			$sql .= " AND brand LIKE '%".$brand."%'";
	if($type)			$sql .= " AND topType LIKE '%".$type."%'";
	if($gender)			$sql .= " AND gender LIKE '".$gender."%'";
	if($size)			$sql .= " AND size LIKE '%".$size."%'";
	if($color)			$sql .= " AND color LIKE '%".$color."%'";
	if($minprice){
		settype($minprice, "integer");
		$sql .= " AND price >= $minprice";
	}
	if($maxprice){
		settype($maxprice, "integer");
		$sql .= " AND price <= $maxprice";
	}
	$res=$con->query($sql);
	
	if ($res->num_rows > 0) {
		while($row=$res->fetch_assoc()){
			echo "<tr><td>" . $row["productNumber"]. "</td><td>" . $row["brand"] ."</td><td>" . $row["topType"]. 
			"</td><td>" . $row["gender"] . "</td><td>" . $row["color"] . "</td><td>". $row["size"].
			"</td><td>" . $row["price"]."</td></tr>";
		}
	}
	else { echo "0 results"; }
}

else if($catLocation == "Bottom"){
	$sql = "select * from Bottom, Product WHERE Bottom.productNumber = Product.productNumber ";
	if($productNumber)	$sql .= " AND productNumber LIKE '%".$productNumber."%'";
	if($brand)			$sql .= " AND brand LIKE '%".$brand."%'";
	if($type)			$sql .= " AND bottomType LIKE '%".$type."%'";
	if($gender)			$sql .= " AND gender LIKE '".$gender."%'";
	if($size)			$sql .= " AND size LIKE '%".$size."%'";
	if($color)			$sql .= " AND color LIKE '%".$color."%'";
	if($minprice){
		settype($minprice, "integer");
		$sql .= " AND price >= $minprice";
	}
	if($maxprice){
		settype($maxprice, "integer");
		$sql .= " AND price <= $maxprice";
	}
	$res=$con->query($sql);
	if ($res->num_rows > 0) {
		while($row=$res->fetch_assoc()){
			echo "<tr><td>" . $row["productNumber"]. "</td><td>" . $row["brand"] ."</td><td>" . $row["bottomType"] . 
			"</td><td>" . $row["gender"]. "</td><td>" . $row["color"] . "</td><td>". $row["size"].
			"</td><td>" . $row["price"]."</td></tr>";
		}
	}
	else { echo "0 results"; }
}

else if($catLocation == "Interior"){
	$sql = "select * from Interior, Product WHERE Interior.productNumber = Product.productNumber ";
	if($productNumber)	$sql .= " AND productNumber LIKE '%".$productNumber."%'";
	if($brand)			$sql .= " AND brand LIKE '%".$brand."%'";
	if($type)			$sql .= " AND InteriorType LIKE '%".$type."%'";
	if($gender)			$sql .= " AND gender LIKE '".$gender."%'";
	if($size)			$sql .= " AND size LIKE '%".$size."%'";
	if($color)			$sql .= " AND color LIKE '%".$color."%'";
	if($minprice){
		settype($minprice, "integer");
		$sql .= " AND price >= $minprice";
	}
	if($maxprice){
		settype($maxprice, "integer");
		$sql .= " AND price <= $maxprice";
	}
	$res=$con->query($sql);
	if ($res->num_rows > 0) {
		while($row=$res->fetch_assoc()){
			echo "<tr><td>" . $row["productNumber"]. "</td><td>" . $row["brand"] ."</td><td>" . $row["InteriorType"] . 
			"</td><td>" . $row["gender"]. "</td><td>" . $row["color"] . "</td><td>". $row["size"].
			"</td><td>" . $row["price"]."</td></tr>";
		}
	}
	else { echo "0 results"; }
}

else if($catLocation == "Accessory"){
	$sql = "select * from Accessory, Product WHERE Accessory.productNumber = Product.productNumber ";
	if($productNumber)	$sql .= " AND productNumber LIKE '%".$productNumber."%'";
	if($brand)			$sql .= " AND brand LIKE '%".$brand."%'";
	if($type)			$sql .= " AND accessoryType LIKE '%".$type."%'";
	if($gender)			$sql .= " AND gender LIKE '".$gender."%'";
	if($color)			$sql .= " AND color LIKE '%".$color."%'";
	if($minprice){
		settype($minprice, "integer");
		$sql .= " AND price >= $minprice";
	}
	if($maxprice){
		settype($maxprice, "integer");
		$sql .= " AND price <= $maxprice";
	}
	$res=$con->query($sql);
	if ($res->num_rows > 0) {
		while($row=$res->fetch_assoc()){
			echo "<tr><td>" . $row["productNumber"]. "</td><td>" . $row["brand"] ."</td><td>" . $row["accessoryType"] . 
			"</td><td>" . $row["gender"]. "</td><td>" . $row["color"] . "</td><td>".$row["size"]. 
			"</td><td>" . $row["price"]."</td></tr>";
		}
	}
	else { echo "0 results"; }
}
?>