<?php 


  if(isset($_POST["lat"]) && isset($_POST["lng"]))
  {
    $lat=$_POST["lat"];
    $lng=$_POST["lng"];
   
  }
  else
    echo("Error in fetching data inner loop");

 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
        <button style="margin: 1%" class="btn btn-primary" type="submit" value="HOME" name='home' color="green " onclick="document.location.href = '/cpt/buttons%20(1).html'">HOME</button>
        <button style="margin: 1%" class="btn btn-success" type="submit" value="HOME" name='home' color="green " onclick="document.location.href = 'http://localhost/cpt/algo1.php'">SELECT SLUMS</button>

    <h3>map</h3>
    <!--The div element for the map -->
    <?php
     
    ?>
    <div id="map"></div>
    <script>
// Initialize and add the map
//echo "$_SESSION["latu"]";
function initMap() {
  

  var navimumbai = {lat: <?php echo"$lat" ?>, lng: <?php echo"$lng" ?>};
  // The map, centered at navi mumbai
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: navimumbai});
  // The marker, positioned at navi mumbai
  var marker = new google.maps.Marker({position: navimumbai, map: map});
}

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0kGfHtikZ2BbwCdukz6uCFAd4o1UpVv8&callback=initMap">
    </script>
  </body>
</html>
