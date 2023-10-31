<?php
session_start();

require "delete.php";

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}

if (isset($_POST['edit'])) {
  $_SESSION['useremail'] = $_POST['email'];

  header("location: edit.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <section>
    <div class="container page">
      <div class="row justify-content-center align-items-center">
        <div class="col-8">
          <div class="table1">
            <div class="logo  bg-primary text-center text-white">
                 <h1 class="text-center text-white h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 p-2">ADMIN PANEL</h1>
            </div>
         
           
            <div class="d-flex justify-content-between">
              <div>
                <a href="registration.php"> <button class="btn btn-primary btn-sm"> Add new User</button> </a>
              </div>

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
            <?php


            ?>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Show details table -->
                <?php
                $c = 0;
                $file = 'data.json';
                $data =  json_decode(file_get_contents($file), true);
                foreach ($data as $key => $value) :
                  $c = $c + 1;
                ?>
                  <tr>

                    <th scope="row"> <?php echo $c ?>
                    </th>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $key  ?></td>
                    <td><?php echo $value['password']  ?></td>
                    <td><?php echo $value['role'] ?></td>


                    <form action="admin.php" method="post">
                      <input type="hidden" name="email" value="<?php echo $key;  ?>">
                      <td>

                        <?php
                        if ($key === "admin@gmail.com") {
                          // If the logged-in user is an admin, hide the delete button.
                          echo "ADMIN";
                        } else {
                          // For non-admin users, show the edit and delete buttons.
                          echo '<button class="btn btn-outline-primary edit mx-1" name="edit">Update</button>';
                          echo '<button class="btn btn-outline-warning mx-2" name="delete" type="submit">Delete Role</button>';
                          echo '<button class="btn btn-sm  btn-danger mx-2" name="deleteuser" type="submit">Delete User</button>';
                        }
                        ?>



                      </td>
                    </form>


                  <?php endforeach ?>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

  </section>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>