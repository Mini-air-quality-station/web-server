<?php
# POST Configuration Website form handler
if ($_POST){
    $output = null;
    $retval = null;
    # Temperature measurement frequency
    if (isset($_POST['tempMeasureFreqControl']) and $_POST['tempMeasureFreqControl'] != "null"){
        $value = $_POST['tempMeasureFreqControl'];
        exec("./scripts/save_new_env_val.py '$value'", $output, $retval);
    }

    # Humidity measurement frequency
    if (isset($_POST['humidityMeasureFreqControl']) and $_POST['humidityMeasureFreqControl'] != "null"){
        $value = $_POST['humidityMeasureFreqControl'];
        exec("./scripts/save_new_env_val.py '$value'", $output, $retval);
    }

    # Pressure measurement frequency
    if (isset($_POST['pressureMeasureFreqControl']) and $_POST['pressureMeasureFreqControl'] != "null"){
        $value = $_POST['pressureMeasureFreqControl'];
        exec("./scripts/save_new_env_val.py '$value'", $output, $retval);
    }

    # PM1.0 particle measurement frequency
    if (isset($_POST['pm1particleMeasureFreqControl']) and $_POST['pm1particleMeasureFreqControl'] != "null"){
        $value = $_POST['pm1particleMeasureFreqControl'];
        exec("./scripts/save_new_env_val.py '$value'", $output, $retval);
    }

    # PM2.5 particle measurement frequency
    if (isset($_POST['pm25particleMeasureFreqControl']) and $_POST['pm25particleMeasureFreqControl'] != "null"){
        $value = $_POST['pm25particleMeasureFreqControl'];
        exec("./scripts/save_new_env_val.py '$value'", $output, $retval);
    }

    # PM10 particle measurement frequency
    if (isset($_POST['pm10particleMeasureFreqControl']) and $_POST['pm10particleMeasureFreqControl'] != "null"){
        $value = $_POST['pm10particleMeasureFreqControl'];
        exec("./scripts/save_new_env_val.py '$value'", $output, $retval);
    }
    if (isset($_POST['poweroff'])){
        exec('sudo ./scripts/poweroff.sh', $output, $value);
    }
    if (isset($_POST['reboot'])){
        exec('sudo ./scripts/reboot.sh', $output, $value);
    }
    if (isset($_POST['userTime']) && isset($_POST['userTimezone'])) {
        $userTime = $_POST['userTime'];
        $userTimezone = $_POST['userTimezone'];
        exec("sudo ./scripts/set_date.py '$userTime' '$userTimezone'", $output, $retval);
    }
}
# Go back to configuration website
header("Location: configuration.php");
exit;
?>
