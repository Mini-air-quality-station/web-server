<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/Raspberry_Pi_Logo.svg">

    <title>About</title>

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
            <li class="nav-item">
              <a class="nav-link" href="configuration.php">Configuration</a>
            </li>
            <?php
            create_list_addresses();
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>About</h1>
      </div>

      <div class="container-fluid" style="margin-bottom: 2em; text-align: center;">
        <div class="row justify-content-center">
          <div class="col-sm-3">
            <b>Hostname</b>
          </div>
          <div class="col-sm-5">
            <?php
            $output=null;
            $retval=null;
            exec('./scripts/get_hostname.sh', $output, $retval);
            echo $output[0];
            ?>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-sm-3">
            <b>Operating system</b>
          </div>
          <div class="col-sm-5">
            <?php
            $output=null;
            $retval=null;
            exec('./scripts/get_os.py', $output, $retval);
            echo $output[0];
            ?>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-sm-3">
            <b>Kernel version</b>
          </div>
          <div class="col-sm-5">
            <?php
            $output=null;
            $retval=null;
            exec('./scripts/get_kernel.sh', $output, $retval);
            echo $output[0];
            ?>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-sm-3">
            <b>Uptime</b>
          </div>
          <div class="col-sm-5">
            <?php
            $output=null;
            $retval=null;
            exec('./scripts/get_uptime.sh', $output, $retval);
            echo $output[0];
            ?>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-sm-3">
            <b>Current system time</b>
          </div>
          <div class="col-sm-5">
            <?php
            $output=null;
            $retval=null;
            exec('./scripts/get_time.py', $output, $retval);
            echo $output[0];
            ?>
          </div>
        </div>
      </div>

    </main>
    <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/common.js"></script>
  </body>
</html>