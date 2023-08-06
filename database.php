<?php
  $db_server = "localhost";
  $db_user = "root"; // your database user
  $db_pass = "Ror"; // your database password
  $db_name = "dbtry1"; // your database name
  $conn = "";

  try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
  }
  // Catch for failed connection to the database
  catch(mysqli_sql_exception) {
    echo "<h1 class='text-danger'>Could Not Connect!</h1>";
  }
?>
