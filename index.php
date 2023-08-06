<?php
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
      <form action="login.php" method="post" class="w-50 my-auto">
        <div class="d-flex justify-content-center">
          <img
            src="./assets/loginDemo.svg"
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
            class="form-control"
            placeholder="Username"
            autocomplete="off"
            required
          />
          <label for="username" class="fw-bold">Username</label>
        </div>
        <div class="form-floating mb-3 ">
          <input
            type="password"
            name="password"
            id="password"
            class="form-control fw-semibold"
            placeholder="password"
            autocomplete="off"
            required
          />
          <label for="password" class="fw-bold">Password</label>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100 fs-4">
          LOGIN
        </button>
        <small class="text-end"
          >Don't have an Account? <a href="signUp.php">Register</a>
        </small>
      </form>
    </main>
  </body>
</html>
