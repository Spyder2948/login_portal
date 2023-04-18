<?php
$showAlert = false;
$showError = false;
$exists = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $cpassword = $_POST["cpwd"];
    $sql = "Select * from `temp_logs` where username = '$username'";
    $exists = mysqli_query($conn, $sql);   
    $exists = mysqli_num_rows($exists);
    if($password == $cpassword && $exists ==  0)
    {
        $sql = "INSERT INTO `temp_logs` (`username`, `password`) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $showAlert = true;
        }
    }
    else if($exists > 0)
    {

    }
    else
        {
            $showError = true;
        }    
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Welcome Aboard!</strong> Your Account has been created Successfully!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if($showError) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Passwords do not match!</strong>  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if($exists > 0)
    {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> Looks like you have already registered here 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    
?>

    <div class="container"> 
        <h1 class="text-center">Sign Up</h1>
        <form action="/PHP/login_website/sign_up.php" method="post"> 
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="username" class="form-control" id="username" name="username">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password</label>
    <input type="password" class="form-control" id="pwd" name="pwd" aria-describedby="pwdhelp">
    <div id="pwdhelp" class="form-text">Keep at least 12 characters, including uppercase, lowercase letters, numbers and special character, e.g., ! @ # ? ] </div>
  </div>
  <div class="mb-3">
    <label for="cpwd" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpwd" name="cpwd" aria-describedby="pwd">
    <div id="pwd" class="form-text">Same as above</div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Agree to Terms and Conditions</label>
  </div>
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>