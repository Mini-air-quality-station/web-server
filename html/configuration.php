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
  </head>

  <body>
      <main role="main" class="container">
      <div class="starter-template">
        <h1>Configure the device.</h1>
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
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>