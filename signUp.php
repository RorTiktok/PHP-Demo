<?php 
  /*Checks if the username is already existing. If not, input the information to the database after hashing the password */
  if(isset($_POST['register'])) {
    include("database.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];
    $sqlUsername = "SELECT * FROM users where username='{$username}';";
    $resultUsername = mysqli_query($conn, $sqlUsername);
    if(mysqli_num_rows($resultUsername) > 0) {
      echo '<div
      class="alert alert-danger alert-dismissible fade show"
      role="alert"
    >
      <strong>Username Taken!</strong>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>
    </div>';
    } else {
      if($password === $conf_password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username, password) VALUES ('$username','$hash');";
        $result = mysqli_query($conn, $sql);
        header("Location: index.php?registerSuccess");
      }
      else {
        echo '<div
        class="alert alert-danger alert-dismissible fade show"
        role="alert"
      >
        <strong>Passwords Do not match!</strong>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="alert"
          aria-label="Close"
        ></button>
      </div>';
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="./assets/logo.ico">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/fae056ab45.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <main class="d-flex justify-content-center min-vh-100">
      <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" class="w-50 my-auto">
        <div class="d-flex justify-content-center">
          <img
            src="./assets/SignUpDemo2.svg"
            alt="Login Picture"
            class="img-fluid"
            width="450px"
            height="450px"
          />
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            name="username"
            id="username"
            class="form-control fw-bold"
            placeholder="Username"
            autocomplete="off"
          />
          <label for="username" class="fw-bold">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="password"
            name="password"
            id="password"
            class="form-control fw-bold"
            placeholder="password"
            autocomplete="off"
            required
          />
          <label for="password" class="fw-bold">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="password"
            name="conf_password"
            id="conf_password"
            class="form-control fw-bold"
            placeholder="confirm password"
            autocomplete="off"
            required
          />
          <label for="conf_password" class="fw-bold">Confirm Password</label>
        </div>
        <button
          type="submit"
          name="register"
          class="btn btn-primary w-100 fs-4 mb-2"
        >
          REGISTER
        </button>
        <small class="text-end"
          >Have an Account already? <a href="index.php">Log In</a>
        </small>
      </form>
    </main>
  </body>
</html>
