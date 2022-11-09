<?php

define('DB_SERVER', 'localhost');
define('DB_NAME', 'root');
define('DB_PASSWORD', '');
define('DB_DBNAME', 'chronos_project');

 $connect = mysqli_connect(DB_SERVER, DB_NAME, DB_PASSWORD, DB_DBNAME);




 // View of the data on the browser

 $sql = "SELECT * FROM  ch_graphs";
 $query = mysqli_query($connect, $sql);
 

 // Line chart Display 

 $sql1 = "SELECT * FROM  ch_graphs";
 $query1 = mysqli_query($connect, $sql1);
 $line_chart = '';
 
 while($row = mysqli_fetch_assoc($query1)){
     $line_chart .= "{ month: '".$row["month"] ."', whatsapp: ".$row["whatsapp"].", telegram: ".$row["telegram"].", instagram : ".$row["instagram"]."}, ";
 
 }
 
 $line_chart = substr($line_chart, 0, -2);


 // Count the total number of records 
 $sql3 = "SELECT SUM(whatsapp) as total, SUM(telegram) as total2, SUM(instagram) as total3 FROM  ch_graphs";
 $query3 = mysqli_query($connect, $sql3);


// Pie Chart 
$sql4 = "SELECT SUM(whatsapp) as total, SUM(telegram) as total2, SUM(instagram) as total3 FROM  ch_graphs";
$query4 = mysqli_query($connect, $sql4);



?>
