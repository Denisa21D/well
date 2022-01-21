
<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "Wellness");
$query = "select b.B_ID, s.S_NAME,s.Place, b.Date,b.Time from services s inner join booking b on s.S_ID=b.S_ID where b.C_ID=" . $_SESSION['ID'];
$result = mysqli_query($connect, $query);
?>
<html>  
 <head>  
          <title>UPDATE</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          
    <script src="jquery.tabledit.min.js"></script>
		<style>
	<?php include 'ta_id.css' 
	?>
	</style>
    </head>  
    <body>  
	
	<div id="logo">
			<a href="Profile.php" id="logoLink"><img src="images/back.png" width="80" height="80" alt="iLand" /> BACK</a>
		</div>
	
  <div class="container">  
   <br />  
   <br />  
   <br />  
            <div class="table-responsive">  
    <h3 align="center">UPDATE BOOKING</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
	  <th>Booking_ID</th>
       <th>Activity</th>
    <th>Place</th>
    <th>Date</th>
	<th>time</th>
      </tr>
     </thead>
     <tbody>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
         <td>'.$row['B_ID'].'</td>
	    <td>'.$row['S_NAME'].'</td>
		<td>'.$row['Place'].'</td>
		<td>'.$row['Date'].'</td>
        <td>'.$row['Time'].'</td>
      </tr>
      ';
     }
     ?>
     </tbody>
    </table>
   </div>  
  </div>  
 </body>  
</html>  
<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'action.php',
      columns:{
       identifier:[0, "B_ID"],
       editable:[[3, 'Date'], [4, 'Time']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id)
       }
      }
     });
 
});  
 </script>