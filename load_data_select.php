<?php   
 $connect = mysqli_connect("localhost", "root", "", "cpt");  
 function fill_brand($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM mycpt2";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["SLUM_NAME"].'">'.$row["SLUM_NAME"].'</option>';  
      }  
      return $output;  
 }  



 ?>  
 <!DOCTYPE html>  
 <html> 

      <head>  
           <title>SELECT SLUMS</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
        <form method="post" action="algo1.php">
           <br /><br />  
           <div class="container">  
                <h3>  
                     <select name="CITY" id="CITY" value='$getuser'>  
                          <option value="">Show All SLUMS</option>  

                          <?php echo fill_brand($connect); ?>  
                     <br /><br />  
                    
                </h3>  
           </div>  
                              </select>  
<input type="submit" value="PROCESS" name='submit'>

          </form>     
          <?php echo""; ?>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var CITY = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{SLUM_NAME:SLUM_NAME},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var CITY = $(this).val();  
           $.ajax({  
                url:"load_data2.php",  
                method:"POST",  
                data:{next:next},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>  