<?php
  /*
    Checks if someone is logged in by looking for an Id
    If it does not exist, users will be sent back to the login page

  */
  session_start();
  if(empty($_SESSION['id'])) {
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomePage</title>
    <link rel="stylesheet" href="./components/navbar.css">
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
    <?php
      include("./components/navbar.php");
    ?>
    <div
      class="d-flex flex-column justify-content-center align-items-center my-auto min-vh-100"
    >
      
      <div class="d-flex justify-content-center mydiv px-2">
        <?php
          if($_SESSION['img_status'] == 0) {
            echo "<img
            src='./assets/coolAvatar.svg'
            alt='Logout Picture' 
            class='img-fluid rounded-circle'
            id='myPic'
            width='450px'
            height='450px'
          />";
          }
          else {
            include("database.php");
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM users WHERE id='$id';";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $img_location = $row['img_location'];
                echo "<img
                src='".$img_location."'
                alt='Logout Picture' 
                class='img-fluid rounded-circle'
                id='myPic'
                width='450px'
                height='450px'
                ".mt_rand()."
                />";
              }
            }
            
          }
          
        ?>
      </div>
      <h1> @<?php echo ($_SESSION['username']); ?></h1>
      <form action="uploadPic.php" method="post" enctype='multipart/form-data' class="px-3">
      <div class="input-group">
        <input type="file" name="file" id="file" class="form-control" id="fileInput" onchange="change()">
        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
      </div>
    </form>
    </div>
    <script src="picChange.js"></script>
  </body>
</html>
