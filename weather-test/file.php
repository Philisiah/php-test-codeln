<!DOCTYPE html>
<html>
<head>
<title>Weather Monitor</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
    background-color: lightblue;
}
h1,h4{
    text-align:center;
}
.flex-container {
  display: flex;
  flex-wrap: wrap;
}
#display{
    margin-right:auto;
    margin-left:auto;
}
.city{
    padding:5px;
    margin:10px;
    border: 2px solid gray;
}
</style>
</head>
<body>
<?php
$city= "";$temp = ""; $vis=""; $unique_id = "";
if(isset($_POST["city"])){
    $city = $_POST["city"];
    $url = "api.openweathermap.org/data/2.5/weather?q=".$city."&APPID=3cecb3e840c1a91c652fb1ade4e5e085";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $resp = json_decode($response, true);
    
    $unique_id = $resp["id"];
    $vis = $resp["visibility"];
    $temp = $resp["main"]["temp"];
    $city = $resp["name"];
}

?>
<h1>WEATHER MONITOR</h1>
<h4 style="text-align:right;"><?php echo date("Y/m/d"); ?></h4>
<div class="container">
<form method="post">
<div class="form-group">
<input type="text" name="city" class="form-control" placeholder="Enter City" required/>
</div>
<input type="submit" value="Search">
</form>
</div>
<div class="container">
<div class="row" id="display">
<h4><?php echo $city; ?></h4>
<table class="table table-bordered">
<tr>
<td>Unique ID:</td>
<td><?php echo $unique_id; ?></td>
</tr>
<tr>
<td>Visiblity:</td>
<td><?php echo $vis; ?></td>
</tr>
<tr>
<td>Temperature:</td>
<td><?php echo $temp; ?></td>
</tr>
</table>
</div>
</div>
<div class="row">
  <div class="col-sm-4">
  <h4>City1</h4>
  <table class="table table-bordered">
  <tr>
  <th>
  unique ID
  <th>
  <td>111<td>
  </tr>
  <tr>
  <th>
  Visibilty
  <th>
  <td>visible<td>
  </tr>
   <tr>
  <th>
  Temperature
  <th>
  <td>45 deg<td>
  </tr>
  </table>
  </div>
  <div class="col-sm-4">
  <h4>City2</h4>
  <table class="table table-bordered">
  <tr>
  <th>
  unique ID
  <th>
  <td>111<td>
  </tr>
  <tr>
  <th>
  Visibilty
  <th>
  <td>visible<td>
  </tr>
   <tr>
  <th>
  Temperature
  <th>
  <td>45 deg<td>
  </tr>
  </table>
  </div>
  
  <div class="col-sm-4">
  <h4>City3</h4>
  <table class="table table-bordered">
  <tr>
  <th>
  unique ID
  <th>
  <td>111<td>
  </tr>
  <tr>
  <th>
  Visibilty
  <th>
  <td>visible<td>
  </tr>
   <tr>
  <th>
  Temperature
  <th>
  <td>45 deg<td>
  </tr>
  </table>
  </div>
  </div>
</div>
</body>
</html>