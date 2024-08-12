<?php
//include "common.php";
include "connect.php";
?>

<script>
confirm("Are you sure");
</script>			
								 
<?php


// Check if ID parameter exists in the URL


   
    //$sql = "SELECT * FROM researchpapersbyfaculty WHERE user_id = ?";
	$sql="UPDATE researchpapersbyfaculty SET status=1 WHERE user_id =".$_GET['id'];
	echo $sql;
    mysqli_query($conn,$sql);
	//header("location: index1admin.php");
	
    //exit();


// Close connection
$conn->close();
?>
<script>
location.replace("index1admin.php");
</script>

								