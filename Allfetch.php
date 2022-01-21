
<?php
session_start();

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=wellness", "root", "");

$output = '';

$query = '';

if(isset($_POST["query"]))
{
 $search = str_replace(",", "|", $_POST["query"]);
 $query = "
select b.B_ID ,c.C_NAME, s.S_NAME,s.Place, b.Date,b.Time from services s inner join booking b on s.S_ID=b.S_ID join Customer c on b.C_ID=c.C_ID where c.C_NAME REGEXP'".$search."'";

}
else
{
 $query = "
 select b.B_ID ,c.C_NAME, s.S_NAME,s.Place, b.Date,b.Time from services s inner join booking b on s.S_ID=b.S_ID join Customer c on b.C_ID=c.C_ID";
}

$statement = $connect->prepare($query);
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
 $data[] = $row;
}

echo json_encode($data);

?>
