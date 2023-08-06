<?php
  //unsets and destroy the session and relocating back to the login page
  session_start();
  if(isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php?logout_success");
  }
?>