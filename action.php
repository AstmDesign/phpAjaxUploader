<?
if($_SERVER['REQUEST_METHOD']=="POST"){

  // print the user data
  echo "<div class='well well-large'>";
  echo "<hr><b>You Entered </b><br /><br>";
  echo "<b>First Name:</b> ". $_POST['fname'] . "<br /><br>";
  echo "<b>Last Name:</b> ". $_POST['lname'] . "<br /><br>";
  echo "<b>Email:</b> ". $_POST['email'] . "<br /><br>";

  // check if there's file or not
  if(is_array($_FILES)) {
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
      // the main file data
      $file_name = basename($_FILES['image']['name']);
      $type = $_FILES["image"]["type"];
      $size = $_FILES['image']['size']/1024;
      // check and create the folder
      if (!is_dir("images")){
        mkdir("images", 0777);
      }
      // move the file
      move_uploaded_file($_FILES['image']['tmp_name'],"images/".$file_name);
      // print the data
      echo "<img src='images/".$file_name."' class='img-thumbnail'><br><br>";
      echo "<b>Uploaded: </b>" . $file_name . "<br><br>";
      echo "<b>Type: </b>" . $type . "<br><br>";
      echo "<b>Size: </b>" . $size . " kB<br><br>";
    }
  }

  echo "</div>";
}//request
?>
