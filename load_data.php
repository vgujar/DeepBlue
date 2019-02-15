 <?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "cpt");  
 $output = '';  
 if(isset($_POST["SLUM_NAME"]))  
 {  
      if($_POST["SLUM_NAME"] != '')  
      {  
           $sql = "SELECT * FROM mycpt2 WHERE SLUM_NAME = '".$_POST["SLUM_NAME"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM mycpt2";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["product_name"].'</div></div>';  
      }  
      echo $output;  
 
 } 

 ?>  