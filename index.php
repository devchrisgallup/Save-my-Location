<?php
    // redirect to HTTPS if SSL is setup
    // getCurrentPosistion may require the use of HTTPS 
    if (! isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
        $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location: $redirect_url");
        exit();
    }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" media="only screen and (max-width: 1200px)" href="css/mobile.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Save My Location</title>
  </head>
  <body>
    <div id="tagline">
        Never forget a location again!
    </div>
    <div id="map">
    </div>
    <div class="getBTN"> 
        <button onclick="getLocation()">Save</button>
        <p id="demo"></p>
    </div>
    
    <div class="getBTN">
        <form action="index.php" method="POST" id="locationForm">
            <input type="text" id="nameofspot" name="nameofspot" placeholder="Name of location.">
            <input type="hidden" id="l" name="l">
            <input type="hidden" id="g" name="g">
        </form>
    </div>
    <?php include("inc/app.php"); ?>
    <script src="js/app.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=yourapikey&callback=initMap"></script>
  </body>
</html>