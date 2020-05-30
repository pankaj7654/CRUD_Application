<!-- this block are used to create a good structure-->
<html>
<body>
<header><h2><u>Student details</u></h2></header><br>
<form action="" method="post">
<table>
<tr>
<td><label>roll no.</label></td>
<td>:</td>
<td><input type="text" placeholder="roll no." name="roll"></td><br>
</tr>
<tr>
<td><label>name</label></td>
<td>:</td>
<td><input type="text" placeholder="name" name="name"></td><br>
</tr>
<tr>
<td><label>father</label></td>
<td>:</td>
<td><input type="text" placeholder="father" name="father"></td><br>
</tr>
<tr>
<td><label>address</label></td>
<td>:</td>
<td><input type="text" placeholder="address" name="address"></td><br>
</tr>
<tr>
<td><label>mobile</label></td>
<td>:</td>
<td><input type="text" placeholder="mobile" name="mobile"></td><br>
</tr>
<tr>
<td><label>gmail</label></td>
<td>:</td>
<td><input type="text" placeholder="gmail" name="gmail"></td><br>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" name="submit"><input type="reset" name="reset"></br></td></tr>
</table>
</body>
</html>

<?php /*this block are use to connection to the database*/
$conn=new mysqli("localhost","root","","pandit");
if($conn->connect_error)
{
	echo exit("connection error".$conn->connect_error);
}
else{
	echo "connected sucessfully</br>";
}

/*this block are use to creating a database */
$sql="create database pandit";
if($conn->query($sql)===TRUE)
{
	echo "database created sucessfully</br>";
}else{
	echo "error".$conn->error;
}

/* this block are use to create a table*/
$sql="create table students(roll varchar(10),name varchar(20),father varchar(20),address varchar(20),mobile varchar(15),gmail varchar(30))";
if($conn->query($sql)===TRUE)
{
	echo "table created sucessfully</br>";
}delse{
	echo "error".$conn->error;
}

/*this block are use to insert data */
if(isset($_POST['submit']))
{
	
	$roll=$_POST['roll'];
	$name=$_POST['name'];
	$father=$_POST['father'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$gmail=$_POST['gmail'];
	$sql="insert into students(roll,name,father,address,mobile,gmail) values('$roll','$name','$father','$address','$mobile','$gmail')";
if($conn->query($sql)===TRUE)
{
	echo "data inserted sucessfully</br>";
}else{
	echo "error".$conn->error;
}
}*/

/*this block are use to delete any data records*/
$sql="drop table students";
if($conn->query($sql)===TRUE)
{
	echo "table deleted sucessfully</br>";
}else{
	echo "error".$conn->error;
}
*/ 
?>

<!--this block are use to design searching records-->
<html>
<form action="" method="post">
<table>
<tr>
<td><input type="submit" value="search"></td>
<td></td>
<td><input type="text" placeholder="enter roll for search" name="rollno"></td>
</tr>
</form>
</table>
<table border=1>
<tr>
<td>roll</td>
<td>name</td>
<td>father</td>
<td>address</td>
<td>mobile</td>
<td>email</td>
</tr>

<?php /*this block are use to searching data from the table and print */
if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(empty($_POST['rollno']))
{
	echo "must be required";
}
else{
if(isset($_POST['rollno']))
{
	$roll=$_POST['rollno'];
	$sql=mysqli_query($conn,"select * from students where roll='$roll'");
	while($result=mysqli_fetch_array($sql))
	{
?>

<tr>
<td><?php echo $result['roll'];?></td>
<td><?php echo $result['name'];?></td>
<td><?php echo $result['father'];?></td>
<td><?php echo $result['address'];?></td>
<td><?php echo $result['mobile'];?></td>
<td><?php echo $result['gmail'];?></td>
</tr>
<?php
	}
}
}
}
?>

<!-- this block are used to design delete record from table-->
</table>
</html>
<html>
<form action="" method="post">
<table>
<tr>
<td><input type="submit" value="delete"></td>
<td></td>
<td><input type="text" placeholder="enter roll for delete" name="rollno2"></td>
</tr>
</form>
</table>
</html>
<?php /*this block are used to deletion process from the table records*/
if(isset($_POST['rollno2']))
{
	$roll=$_POST['rollno2'];
	$sql="delete from students where roll='$roll'";
	if($conn->query($sql)===TRUE)
	{
		echo "row deleted sucessfully</br>";
	}
	else
	{
		echo "error".$conn->error;
	}
}
?>
