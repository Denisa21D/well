
<?php
session_start();

//fetch.php
$_SESSION['q']="";
$connect = new PDO("mysql:host=localhost;dbname=wellness", "root", "");

$output = '';

$query = '';

if(isset($_POST["query"]))
{
 $search = str_replace(",", "|", $_POST["query"]);
 $query = "
 select b.B_ID, s.S_NAME,s.Place, b.Date,b.Time from services s inner join booking b on s.S_ID=b.S_ID where b.Date REGEXP '".$search."' 
 OR s.Place REGEXP '".$search."' 
 And b.C_ID=" . $_SESSION['ID'];
 
 $_SESSION['q']=$query;
}
else
{
 $query = "
 select b.B_ID, s.S_NAME,s.Place, b.Date,b.Time from services s inner join booking b on s.S_ID=b.S_ID where b.C_ID=
 " . $_SESSION['ID'];;
}

$statement = $connect->prepare($query);
$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
 $data[] = $row;
}

echo json_encode($data);

?>
