<?php
function create_sensor_freq_list($filename, $sensor_no=null) {
  $output=null;
  $retval=null;
  if ($sensor_no == null){
    exec("./scripts/get_sensor_info.py $filename", $output, $retval);
  } else {
    exec("./scripts/get_sensor_info.py $filename $sensor_no", $output, $retval);
  }
  $data = json_decode($output[0], true);
  $freq_unit = $data['measure_freq_unit'];
  $freq_values = explode(",",trim($data['measure_freq_caps'], "[]"));
  $current_freq = $data['current_freq'];
  $env_name = $data['env_name'];
  echo "<option value=\"null\"> Not changed: " .$current_freq.$freq_unit." </option>";
  foreach ($freq_values as $freq_value){
    if ($freq_value != $current_freq){
      $form_value = $freq_value . " " . $env_name;
      echo "<option value=\"$form_value\">" . $freq_value . $freq_unit . "</option>"; //"value env"
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/Raspberry_Pi_Logo.svg">

    <title>Configuration</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <?php include 'common.php'; ?>
  </head>

  <body>
      <div class="mobile-hidden">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="index.php">Mini Air Quality Station</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Configuration <span class="sr-only">(current)</span> </a>
              </li>
              <?php
              create_list_addresses();
              ?>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>

      <main role="main" class="container">
      <div class="starter-template">
        <h1>Device configuration</h1>
      </div>

      <div class="container">
        <form class="form-horizontal" action="form_handler.php" method="post">
          <!-- Temperature measurement frequency -->
          <div class="form-group">
          <label for="tempMeasureFreqControl">Temperature measurement frequency</label>
            <select class="form-control" id="tempMeasureFreqControl" name="tempMeasureFreqControl">
            <?php
            create_sensor_freq_list('temperature_sensor.yaml')
            ?>
            </select>
          </div>
          
          <!-- Humidity measurement frequency -->
          <div class="form-group">
          <label for="humidityMeasureFreqControl">Humidity measurement frequency</label>
            <select class="form-control" id="humidityMeasureFreqControl" name="humidityMeasureFreqControl">
            <?php
            create_sensor_freq_list('humidity_sensor.yaml')
            ?>
            </select>
          </div>

          <!-- Pressure measurement frequency -->
          <div class="form-group">
          <label for="pressureMeasureFreqControl">Pressure measurement frequency</label>
            <select class="form-control" id="pressureMeasureFreqControl" name="pressureMeasureFreqControl">
            <?php
            create_sensor_freq_list('pressure_sensor.yaml')
            ?>
            </select>
          </div>

          <!-- PM1.0 particle measurement frequency -->
          <div class="form-group">
          <label for="pm1particleMeasureFreqControl">PM1.0 particle measurement frequency</label>
            <select class="form-control" id="pm1particleMeasureFreqControl" name="pm1particleMeasureFreqControl">
            <?php
            create_sensor_freq_list('particles_sensor.yaml 0')
            ?>
            </select>
          </div>

          <!-- PM2.5 particle measurement frequency -->
          <div class="form-group">
          <label for="pm25particleMeasureFreqControl">PM2.5 particle measurement frequency</label>
            <select class="form-control" id="pm25particleMeasureFreqControl" name="pm25particleMeasureFreqControl">
            <?php
            create_sensor_freq_list('particles_sensor.yaml 1')
            ?>
            </select>
          </div>

          <!-- PM10 particle measurement frequency -->
          <div class="form-group">
          <label for="pm10particleMeasureFreqControl">PM10 particle measurement frequency</label>
            <select class="form-control" id="pm10particleMeasureFreqControl" name="pm10particleMeasureFreqControl">
            <?php
            create_sensor_freq_list('particles_sensor.yaml 2')
            ?>
            </select>
          </div>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <br/>

      <div class="container">
        <form class="form-horizontal" action="form_handler.php" method="post">
          <input type="hidden" name="poweroff">
          <button type="submit" class="btn btn-default">Power off</button>
        </form>
      </div>
      <br/>
      <div class="container">
        <form id="userTimeForm" class="form-horizontal" action="form_handler.php" method="post">
          <button type="submit" class="btn btn-default" onclick="sendUserTime()">Sync time with user</button>
        </form>
      </div>
      <br/>
      <div class="container" style="margin-bottom:2em;">
        <form class="form-horizontal" action="form_handler.php" method="post">
          <input type="hidden" name="reboot">
          <button type="submit" class="btn btn-default">Reboot</button>
        </form>
      </div>
    </main>
    <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/common.js"></script>
  </body>
</html>