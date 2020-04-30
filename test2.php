<?php
echo "Today is: " . date("Y-m-d") . "<br>";
echo "Today is: " . date("l") . "<br>";
echo "<br>";
date_default_timezone_set("America/Chicago");
echo "The time is " . date("h:i:sa");
?>

<html> 
 <body>
 <style>
body {background-color: oldlace;}
h1   {color: black;}
p    {color: black;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

}
</style>
<h1 style="text-align:center">RAD Clothing: Official Website</h1>
<p>This is the offical site of RAD clothing; the best place to find local clothing in Stillwater! This website was created in 2020 by Rachel Hadley, Duyen Hoang and Aaron Gross.
We hope that you find what you are looking for from these local clothing stores in the Stillwater, Oklahoma area!<br></p> 

<p> Here are some links to the clothing stores located in Stillwater </p>
<a href="https://oldnavy.gap.com/">Old Navy</a>
<a href="https://www.rossstores.com/">Ross</a>
<a href="https://tjmaxx.tjx.com/store/index.jsp">T.J. Maxx</a>
<a href="https://www.maurices.com/">Maurices</a>
<a href="https://www.ae.com/us/en">American Eagle</a>
<a href="https://www.catofashions.com/">Cato</a>
<a href="https://www.belk.com/">Belk</a>
<a href="https://www.buckle.com/">Buckle</a>

<nav>
  <ul>
	<li><a href="test2.php"style="text-align:center">Home</a></li>
	<li><a href="product.php">Product</a></li>
    <li><a href="top.php">Tops</a></li>
    <li><a href="bottom.php">Bottoms</a></li>
    <li><a href="interior.php">Interiors</a></li>
    <li><a href="accessory.php">Accessories</a></li>
	<li><a href="searchtest.php">Search Clothing</a></li>
  </ul>
</nav>

<p> <br> </p>


<div>
     <iframe width="325" height="280" frameborder="0" src="https://www.bing.com/maps/embed?h=280&w=325&cp=36.11755753536533~-97.05333963012698&lvl=13&typ=d&sty=h&src=SHELL&FORM=MBEDV8" scrolling="no">
     </iframe>
     <div style="white-space: nowrap; text-align: center; width: 325px; padding: 6px 0;">
        <a id="largeMapLink" href="https://www.bing.com/maps?cp=36.11755753536533~-97.05333963012698&amp;sty=h&amp;lvl=13&amp;FORM=MBEDLD" target="_blank">View Larger Map</a> &nbsp; | &nbsp;
        <a id="dirMapLink" href="https://www.bing.com/maps/directions?cp=36.11755753536533~-97.05333963012698&amp;sty=h&amp;lvl=13&amp;rtp=~pos.36.11755753536533_-97.05333963012698____&amp;FORM=MBEDLD" target="_blank">Get Directions</a>
    </div>
</div>

<html>
<img src="map2.PNG" usemap="#image-map">

<map name="image-map">
    <area target="" alt="Buckle" title="Buckle" href="https://www.buckle.com/" coords="450,451,9" shape="circle">
    <area target="" alt="Old Navy" title="Old Navy" href="https://oldnavy.gap.com/" coords="279,478,10" shape="circle">
    <area target="" alt="Ross" title="Ross" href="https://www.rossstores.com/" coords="350,63,14" shape="circle">
    <area target="" alt="TJ Maxx" title="TJ Maxx" href="https://tjmaxx.tjx.com/store/index.jsp" coords="281,470,12" shape="circle">
    <area target="" alt="Maurices" title="Maurices" href="https://www.maurices.com/" coords="452,473,11" shape="circle">
    <area target="" alt="American Eagle" title="American Eagle" href="https://www.ae.com/us/en" coords="453,460,9" shape="circle">
    <area target="" alt="Cato" title="Cato" href="https://www.catofashions.com/" coords="276,453,12" shape="circle">
    <area target="" alt="Belk" title="Belk" href="https://www.belk.com/" coords="346,97,13" shape="circle">
</map>
</html>


 </body>
 </html>