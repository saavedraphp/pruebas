<?php

//fetch.php;

$connect = new PDO("mysql:host=localhost; dbname=test", "root", "");

$received_data = json_decode(file_get_contents("php://input"));

$data = array();

if($received_data->query != '')
{
 $query = "
 SELECT * FROM apps_countries 
 WHERE country_name LIKE '%".$received_data->query."%' 
 ORDER BY country_name ASC 
 LIMIT 10
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
}

echo json_encode($data);

?>
