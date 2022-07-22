<?php
include_once("../user/guest.php");
include_once('../classes/login.class.php');
// login process
if(isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass_encrypt = md5($password);
    $errors = array();
    //validations
    if(empty($email)) {
      $errors['email'] = 'email should not be empty';
    }
    if(empty($password)) {
      $errors['password'] = 'incorrect username/password';
    }
    // calling function  
    $log = new Login();        
    if(!$errors) {       
        $log->insertVal($email,$pass_encrypt); 
        $log->loggingIn($email,$pass_encrypt);
    } 
    $errors['password'] = 'incorrect username/password';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/normalize.css" />
</head>
<body>
<div class="outer--blue">
      <div class="outer">
        <div class="txt_field">
          <div class="header">
            <h2 class="heading">Welcome Back!</h2>
            <p class="para">Sign in to continue.</p>
          </div>
          <form method="POST" class="form">
            <div class="first-text">
              <p class="danger__gap">Email</p>
              <input
                type="email"
                class="input"
                id="text-danger2"
                placeholder="Enter E-mail"
                name="email"
                value="<?php  if(isset($email)) echo $email; ?>"
              />
              <span class="text-danger"><?php if(isset($errors['email'])) echo $errors['email']; ?></span>
            </div>
            <div class="first-text">
              <div class="forgot">
                <p class="danger__gap">Password</p>
                <a href="forgot.php" class="pass-link">Forgot Password?</a>
              </div>
              <input
                type="password"
                class="input"
                placeholder="Enter password"
                name="password"
              />
            </div>
            <div class="form-check">
              <div>
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="check"
                  value="check"
                />
              </div>
              <div>
                <label class="form-check-input">Remember Me</label>
              </div>
            </div>
            <div class="submit">
              <input type="submit" name="Login" value="Login" />
            </div>
          </form>
        </div>
        <div>
          <p class="copy">&copy; 2022 login page.</p>
        </div>
      </div>
    </div>
</body>
</html>