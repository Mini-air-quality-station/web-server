<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/Raspberry_Pi_Logo.svg">

    <title>Mini Air Quality Station</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <?php include 'common.php'; ?>
  </head>

  <body>
    <div class="mobile-hidden">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top mobile-hidden">
        <a class="navbar-brand" href="#">Mini Air Quality Station</a>
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
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Welcome to Mini Air Quality Station configuration!</h1>
        <p class="lead">You can show info about the device, configure it and display measurements.</p>
        <!-- TODO: Add picture of the station -->
      </div>

    </main>
    <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/common.js"></script>
  </body>
</html>