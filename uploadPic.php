<?php
//Picture upload logic
session_start();
include("database.php");
  if(isset($_POST["upload"])) {
    $file = $_FILES['file'];
    // Get the filename, file temp name, file size, file error, file type
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    // Get the file extension by exploding the filename and getting the words after . for ex 'movie.mp4'
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    // Allowed file types
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    // if the file extension is within the allowed file types
    if(in_array($fileActualExt, $allowed)) {
      // if file error is  0
      if($fileError === 0) {
        // and file size is less than 500mb
        if($fileSize < 500000) {
          //Create the file name with the profile ID
          $fileNameNew = "profile".$_SESSION['id'].".".$fileActualExt;
          //File Destination
          $fileDestination = './uploads/'.$fileNameNew;
          //Move to file destination
          move_uploaded_file($fileTmpName, $fileDestination);
          //Update status to 1 if they uploaded an Image
          $sqlLoc = "UPDATE users SET img_location = '{$fileDestination}' WHERE id='{$_SESSION['id']}';";
          $resultLoc = mysqli_query($conn, $sqlLoc);
          $sqlstat = "UPDATE users SET img_status =1 WHERE id='{$_SESSION['id']}';";
          $resultstat = mysqli_query($conn, $sqlstat);
          $_SESSION['img_status'] = 1;
        }
        else {
          echo "Maximum file size exceeded!";
        }
      }
      else {
        echo "There was an error uploading your file!";
      }
    }
    else {
      echo "You cannot upload files of this type!";
    }
    header("Location: home.php");
  }
?>