<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


echo "<table border='3'>";
echo "<tr>";
echo "<th>Type:$item->product_name</th>";
echo "<th>Price:$item->list_price</th>";
echo "</tr>";

echo "<tr>";
echo "<td><h5>About:</h5><p>code:$item->PRODUCT_code</p><p>item id:$item->id</p><p>rating:$item->Rating</p></td>";
echo "<td><img src='images/$item->Photo' /></td>";
echo "</tr>";

echo "</table>";
?>
<a href="index.php">
    << Back </a>