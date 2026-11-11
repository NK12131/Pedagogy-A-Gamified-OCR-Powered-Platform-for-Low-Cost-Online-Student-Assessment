 <?php 
 $conn = mysqli_connect("localhost","root","","demo");
 ob_start(); session_start();
 
if(isset($_SESSION['newid']))
{
	// header("location:index.php");

}
else
{
	header("location:index.php");
}

?>

 <div align="right"><a href="logout.php" style="margin-right:80px;">logout</a></div>
 
 secure page test
 