<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles.css" />
  <title>Hello, world!</title>

</head>

<body>
  <?php
  function getClientDetails($tableName, $dbName)
  { {
      $serverName = "localhost";
      $userName = "root";
      $password = "";
      $connection = new mysqli($serverName, $userName, $password, $dbName);
      if ($connection->connect_error) {
        die("Connection
            failed: " . $connection->connect_error);
      }
      session_start();
      $_POST = $_SESSION;
      $email = $_POST['Email'];
      $sql = "SELECT * from $tableName WHERE email='$email'";
      $result =
        $connection->query($sql);
      if ($result->num_rows > 0) {
        echo "
            <table>
              <th>ID</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Policy</th>
              <th>Description</th>
              ";
        while ($row = $result->fetch_assoc()) {
          echo "
              <tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row['fullname'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['policyNumber'] . "</td>
                <td>" . $row['policyDescription'] . "</td>
              </tr>
              ";
        }
        echo "
            </table>
            ";
      } else {
        echo "0 results";
        header("Location:
            http://localhost/ELearning_Website_Bootstrap/Register.html");
      }
      $connection->close();
    }
  } ?>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index.html" id="navbarTitle">
      <b>LifeInsure</b>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="Login.html">Login<span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Register.html">Register</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Science
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./Science/Flowers.html">
              Parts of a Flower
            </a>
            <a class="dropdown-item" href="./Science/humanBody.html">
              Parts of the Human Body
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-lg">
    <div class="center-element">
      <h1>Results</h1>
      <?php getClientDetails("Policies", "Insurance"); ?>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>