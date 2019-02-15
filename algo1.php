<!DOCTYPE html>
<html>
<head>
	<style>
	.button{
	position: relative;
	transition: .5s ease;
	/*bottom: 13.5%;*/
	/*right: 23%;*/
	background-color: #4CAF50;
	border: none;
	color: white;
	padding: 9px 9px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 10px 2px;
	cursor: pointer;
	}</style>
	

<body><button style="margin: 1%" class="btn btn-success" type="submit" value="HOME" name='home' onclick="document.location.href = '/cpt/buttons%20(1).html'">HOME</button>
	

	

 <table width="400" border="2" cellpadding="2" cellspacing='1'>

           <tr bgcolor="#2ECCFA">
                     <th>CITY</th>
                     <th>SLUM_NAME</th>
                     <th>AREA</th>
                     <th>POPULATION</th>
                     <th>CTB</th>
                     <th>NO_OF_PEOPLE_USING_CTB</th>
                     <th>AVAILABILITY_OF_WATER</th>
                     <th>OPEN_SPACE</th>
                     <th>NO_OF_OPEN_SPACE</th>
                     <th>HOUSEHOLD_TOILETS</th>
                     <th>LAT</th>
                     <th>LNG</th>

    
</tr>


<?php 


 $connect = mysqli_connect("localhost", "root", "","cpt");

if($connect=== false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
include_once 'load_data_select.php';

error_reporting(E_ERROR | E_PARSE);
if (isset($_POST["CITY"]))  
 {
 $p=$_POST["CITY"];
 $query="SELECT * FROM mycpt2,mycpt4 WHERE  mycpt2.SLUM_NAME=mycpt4.SLUM_NAME AND mycpt2.SLUM_NAME='$p'";
 // $query="SELECT * from tbl_rating WHERE id= (SELECT id from tbl_restaurant,tbl_rating WHERE tbl_restaurant.name='$p' AND tbl_restaurant.id=tbl_rating.id)";
  $result = mysqli_query($connect,$query);
  // $result1=mysqli_query($connect,$sql);
  $rowcount=mysqli_num_rows($result);
 

 //main code
   
            if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$SLUM_NAME=$row['SLUM_NAME'];
				$CITY=$row['CITY'];
				$AREA=$row['AREA'];
				$POPULATION=$row['POPULATION'];
				$CTB=$row['CTB'];
				$NO_OF_PEOPLE_USING_CTB=$row['NO_OF_PEOPLE_USING_CTB'];
				$AVAILABILITY_OF_WATER=$row['AVAILABILITY_OF_WATER'];
				$OPEN_SPACE=$row['OPEN_SPACE'];
				$NO_OF_OPEN_SPACE=$row['NO_OF_OPEN_SPACE'];
				$HOUSEHOLD_TOILETS=$row['HOUSEHOLD_TOILETS'];
				$MEN=$row['MEN'];
				$CTB_NAME=$row['CTB_NAME'];
				$CTB_GENDER_USAGE=$row['CTB_GENDER_USAGE'];
				$SEAT_NOT_IN_USE_1=$row['SEAT_NOT_IN_USE_1'];
				$COUNT_1=$row['COUNT_1'];
				$WOMEN=$row['WOMEN'];
				$SEAT_NOT_IN_USE_2=$row['SEAT_NOT_IN_USE_2'];
				$COUNT_2=$row['COUNT_2'];
				$MIX=$row['MIX'];
				$SEAT_NOT_IN_USE_3=$row['SEAT_NOT_IN_USE_3'];
				$LAT=$row['LAT'];
				$LNG=$row['LNG'];
				$COUNT_3=$row['COUNT_3'];
				$SBM_TOILET=$row['SBM_TOILET'];
				$SHARED_TOILET=$row['SHARED_TOILET'];
                  
                  $z=round(($POPULATION-($HOUSEHOLD_TOILETS+$SBM_TOILET+$SHARED_TOILET+$NO_OF_PEOPLE_USING_CTB))/335);
                  $y=round($z/11);
				
				// echo "<p style='color:red;'>COUNT OF TOILETS REQUIRED IS".$z."</p>";
				//echo $SLUM_NAME, "&nbsp CTBNAME IS &nbsp" ,$CTB_NAME;
                       
                       echo "<tr>";

		               echo "<td>".$CITY."</td>";
		               echo "<td>".$SLUM_NAME."</td>";
		               echo "<td>".$AREA."</td>";
		               echo "<td>".$POPULATION."</td>";
		               echo "<td>".$CTB."</td>";
		               echo "<td>".$NO_OF_PEOPLE_USING_CTB."</td>";
		               echo "<td>".$AVAILABILITY_OF_WATER."</td>";
		               echo "<td>".$OPEN_SPACE."</td>";
		               echo "<td>".$NO_OF_OPEN_SPACE."</td>";
		               echo "<td>".$HOUSEHOLD_TOILETS."</td>";
		               echo "<td>".$LAT."</td>";
		               echo "<td>".$LNG."</td>";

		               
                        echo "</tr>";

                        $x=35*$COUNT_1+25*$COUNT_2;
                        


  
				/* if($NO_OF_PEOPLE_USING_CTB>=$x) // considering population paramter
				  {
                     //echo $LAT,$LNG;
				 	echo "<p><font color=blue size=5px>Toilet is required</font></p>";
				  	if($OPEN_SPACE>=1)   // if we required toilet,suppose in particular slum and open space is not avialable then we need to give some other option
				     {
				 	echo "<h1>open space is available</h1>";
				     }
					      ///echo "<h1 style='color: blue'>".$CTB_GENDER_USAGE."</h1>";
					     else if(strcmp($CTB_GENDER_USAGE,"DEDICATED SEATS"))
					    {
					    	
					  	  $effmen=$COUNT_1/$MEN;
					  	  $effwomen=$COUNT_2 /$WOMEN;
					  	  echo "<h1 style='color: blue>'".$effmen."</h1>";
					      if ($effmen<1)
					      {
					      echo "&nbsp requires toilet cleaniiness";	
					      }
				      else if($effwomen<1)
				      {
				      	echo "requires toilet cleaniiness";
				      }
				      else
				      {
				      	echo "&nbsp no problem";
				      }
				    }
				    // else if(strcmp($CTB_GENDER_USAGE,"MIX"))
				    // {
				    // 	$effmix=$COUNT_3 /$MIX;
				    // 	if ($effmix<1)
				    //   {
				    //   echo "requires toilet cleaniiness";	
				    //   }
				    //   else
				    //   {
				    //   	echo "&nbsp no problem&nbsp ";
				    //   }
				    // }
				     // else if (strcmp($CTB_GENDER_USAGE,"CLOSED"))
				     // {
				     // 	{
				     // 		echo "Toilet is closed";
				     // 	}
				    
         //            }

                    else
                    {
                    	echo "";
                    }
				
				  	
				   
				    //write here count of toilets logic
				  }  
				 
				 else 
				 {
				  
				  echo "";
				}
	
		}	*/
	
//write rating code here
      if ($NO_OF_PEOPLE_USING_CTB>=$x)
{
	echo "<h1><p style='color:black;'>Toilet is required at ".$p."</p></h1>";
	echo "<h1><p style='color:blue;'>COUNT OF TOILETS REQUIRED IS :".$y."</p></h1>";

	if($NO_OF_OPEN_SPACE>=1)
	{
	 	echo "<h1><br><p style ='color:black;'>Open space is available at ".$p."</p></h1>";
	}
	else
	{   echo "<h1><br><p style='color:blue;'>Open space is unavailable but there might be some issues regarding available toilets</p></h1>";
	    if(strcmp($CTB_GENDER_USAGE,"DEDICATED SEATS"))
	    {
	                      $effmen=$COUNT_1/$MEN;
					  	  $effwomen=$COUNT_2 /$WOMEN;
					      if ($effmen<1)
					      {
					      echo "<h1> Some issues in mens toilet please verify</h1>";	
					      }
					      else
					      {
						       if($effwomen<1)
						      {
						      	echo "Some issues in womens toilet please verify";
						      }
					 	   }
					      
	    }
	    if(strcmp($CTB_GENDER_USAGE,"MIX"))
	    {
				        $effmix=$COUNT_3 /$MIX;
						if ($effmix<1)
						{
						    echo "requires toilet cleaniiness";	
						}
						 else
					    {
							echo "<h1>no problem in mixed toilets&nbsp</h1> ";
					    }

        }

       if (strcmp($CTB_GENDER_USAGE,"CLOSED"))
       {
             			echo "<h1>Issue is Toilets are closed please check</h1>";
       }

	}//closing of else
}//closing of toilets required
else
{

	echo "<h1>toilet not required</h1>";
	echo "<h1><p style='color:blue;'>COUNT OF TOILETS REQUIRED IS :0</h1></p>";
}

}		

}
else
{


	echo "Please select a slum name";
}


}?>

</table>
</body>
</head>
</html>

<html>
<body>

<form action="map2.php" method="post" target="_blank">

  <input type="hidden" name="lat" id="lat" value="<?php echo"$LAT" ?>">
  <input type="hidden" name="lng" id="lng" value="<?php echo"$LNG" ?>">
 <center><input type="submit" value="Show location" class="button"></center>

</form>

</body>
</html> 



        