<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'testing');

$input = filter_input_array(INPUT_POST);

$Date = mysqli_real_escape_string($connect, $input["Date"]);
$Time = mysqli_real_escape_string($connect, $input["Time"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE Booking 
 SET Date = '".$Date."', 
 Time = '".$Time."' 
 WHERE id = '".$input["B_ID"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM tbl_user 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>
