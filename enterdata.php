<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title></title>
</head>
<body>

<button style="margin: 1%" class="btn btn-success" type="submit" value="Mainpage" name='home' onclick="document.location.href = 'http://localhost/cpt/algo1.php'">SELECT SLUMS</button>
<button style="margin: 1%" class="btn btn-success" type="submit" value="HOME" name='home' onclick="document.location.href = '/cpt/buttons%20(1).html'">HOME</button>



<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "cpt");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  if(isset($_POST["submit"]))
  {
// Escape user inputs for security
$CITY = mysqli_real_escape_string($link, $_POST['city']);
$SLUM_NAME = mysqli_real_escape_string($link, $_POST['SLUM_NAME']);
$AREA = mysqli_real_escape_string($link, $_POST['AREA']);
$CTB = mysqli_real_escape_string($link, $_POST['CTB']);
$POPULATION = mysqli_real_escape_string($link, $_POST['POPULATION']);
$NO_OF_PEOPLE_USING_CTB = mysqli_real_escape_string($link, $_POST['NO_OF_PEOPLE_USING_CTB']);
$AVAILABILITY_OF_WATER = mysqli_real_escape_string($link, $_POST['AVAILABILITY_OF_WATER']);
$OPEN_SPACE = mysqli_real_escape_string($link, $_POST['os']);
$NO_OF_OPEN_SPACE = mysqli_real_escape_string($link, $_POST['NO_OF_OPEN_SPACE']);
$HOUSEHOLD_TOILETS = mysqli_real_escape_string($link, $_POST['HOUSEHOLD_TOILETS']);
$LAT = mysqli_real_escape_string($link, $_POST['LAT']);
$LNG = mysqli_real_escape_string($link, $_POST['LNG']);

//$CITY2=mysqli_real_escape_string($link, $_POST['city']);
//$SLUM_NAME2=mysqli_real_escape_string($link, $_POST['SLUM_NAME']);
$CTB_NAME= mysqli_real_escape_string($link, $_POST['CTB_NAME']);
$CTB_GENDER_USAGE= mysqli_real_escape_string($link, $_POST['ctbg']);
$NUMBER_OF_MEN_SEAT=mysqli_real_escape_string($link, $_POST['NUMBER_OF_MEN_SEAT']);
$SEAT_NOT_IN_USE1_MEN=mysqli_real_escape_string($link, $_POST['SEAT_NOT_IN_USE1_MEN']);
$NUMBER_OF_WOMEN_SEAT=mysqli_real_escape_string($link, $_POST['NUMBER_OF_WOMEN_SEAT']);
$SEAT_NOT_IN_USE2_WOMEN=mysqli_real_escape_string($link, $_POST['SEAT_NOT_IN_USE2_WOMEN']);
$MIX=mysqli_real_escape_string($link, $_POST['MIX']);
$SEAT_NOT_IN_USE_MIX=mysqli_real_escape_string($link, $_POST['SEAT_NOT_IN_USE_MIX']);



 
// Attempt insert query execution
$sql = "INSERT INTO mycpt2 (CITY,SLUM_NAME,AREA,POPULATION,CTB,NO_OF_PEOPLE_USING_CTB,AVAILABILITY_OF_WATER,OPEN_SPACE,NO_OF_OPEN_SPACE,HOUSEHOLD_TOILETS,LAT,LNG) VALUES ('$CITY','$SLUM_NAME','$AREA','$POPULATION','$CTB','$NO_OF_PEOPLE_USING_CTB','$AVAILABILITY_OF_WATER','$OPEN_SPACE',
 	'$NO_OF_OPEN_SPACE','$HOUSEHOLD_TOILETS','$LAT','$LNG');
INSERT INTO tbl_restaurant(name,address)VALUES('$SLUM_NAME','$CITY');
 	INSERT INTO mycpt4(CITY,SLUM_NAME,CTB_NAME,CTB_GENDER_USAGE,MEN,SEAT_NOT_IN_USE_1,WOMEN,SEAT_NOT_IN_USE_2,MIX,SEAT_NOT_IN_USE_3)VALUES('$CITY','$SLUM_NAME','$CTB_NAME','$CTB_GENDER_USAGE','$NUMBER_OF_MEN_SEAT','$SEAT_NOT_IN_USE1_MEN','$NUMBER_OF_WOMEN_SEAT','$SEAT_NOT_IN_USE2_WOMEN','$MIX','$SEAT_NOT_IN_USE_MIX');";

  
if(mysqli_multi_query($link, $sql))
{

    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 }
// Close connection
mysqli_close($link);
?>
</body>
</html>
