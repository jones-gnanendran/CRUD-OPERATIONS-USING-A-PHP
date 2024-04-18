<?php
$server="localhost";
$user="root";
$password="";
$dbname="student_details";
$connection=mysqli_connect($server,$user,$password,$dbname)or die("Connection failed");
if(isset($_POST['action']))
{
	$bu=$_POST['action'];
	$sname=$_POST['name'];
	$sage=$_POST['age'];
	$syear=$_POST['year'];
	$sdept=$_POST['Dept'];
if($bu=='insert')
{
	$sql="INSERT INTO student_info(Name,Age,Year,Dept)VALUES('$sname','$sage','$syear','$sdept')";
if(mysqli_query($connection,$sql)){
	echo "New Record Successfully inserted";
}
else
{
echo"Error";
} 
}
else if($bu=='delete')
{
	$sql="DELETE FROM student_info WHERE Name='$sname'";
	if(mysqli_query($connection,$sql))
	{
		echo "Record Successfully deleted";
	}
	else
	{
		echo "Error";
	}
}
else if($bu=='update')
{
	$sql="UPDATE student_info SET Age='$sage', Year='$syear' WHERE 	Name='$sname'";
	if(mysqli_query($connection,$sql))
	{
		echo "Record Updated Successfully";
	}
	else
	{
		echo "error";
	}


}
else if($bu=='read')
{
	$sql="SELECT * FROM student_info";
	$result=mysqli_query($connection,$sql);
	if($result)
	{
			echo "Displaying all the records";
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<br>Name: " . $row['Name'] . " - Age: " . $row['Age'] . " - Year: " . $row['Year'] . " - Dept: " . $row['Dept'];
			}
	}
	else
	{
		echo "error";
	}
}
}
?>