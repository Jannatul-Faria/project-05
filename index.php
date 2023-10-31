<?php
session_start();




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    .table1 {
      margin-top: 10rem;
    }
  </style>
</head>

<body>
  <section>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-8">
          <div class="table1">

            <h2>A Role Management System</h2>
            <p>Welcome,  <?php echo (isset($_SESSION['email'])) ?  $_SESSION['email'] : 'GUEST'  ?></p>
            <div class="d-flex justify-content-between">
        
              <div>
                <?php
                if (!isset($_SESSION['email']))
                  echo '<a href="login.php"><button class="btn btn-primary btn-sm">Login</button></a>';
                else
                  echo '<a href="logout.php"><button class="btn btn-primary btn-sm">Logout</button></a>';
                ?>


              </div>
            </div>

            <hr>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>