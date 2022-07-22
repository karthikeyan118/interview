<?php
include_once("../user/user.php");
include_once('../classes/add.class.php');
if(isset($_POST['Add'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];     
   
    $errors = array(); 
    if(empty($email)) {
        $errors['email'] = 'email should not be empty';
      }
      if(empty($fname)) {
        $errors['fname'] = 'name should not be empty';
      }
      if(empty($lname)) {
        $errors['lname'] = 'name should not be empty';
      }

  // function for username and email already exist or not
  $emp = new Add();
  $errors = $emp->Add($email,$errors);
  if(!$errors) {  
   $emp->insertEmp($fname,$lname,$age,$gender,$email,$address); 
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/normalize.css" />
</head>
<body>
<div class="outer--blue">
      <div class="outer">
        <div class="txt_field txt_fieldgap">
          <div class="header">
            <h2 class="heading">Add employees here</h2>           
          </div>
          <form
            action="add.php"
            method="POST"
            enctype="multipart/form-data"
            class="form"
            id="myform1"
          >
            <div class="first-text">
              <p>Firstname</p>
              <input
                type="text"
                class="input"
                id="text-danger1"
                placeholder="Enter firstname"
                name="fname"
              />
              <span class="text-danger" id="t__d1"><?php if(isset($errors['fname'])) echo $errors['fname']; ?></span>
            </div>
            <div class="first-text">
              <p>Lastname</p>
              <input
                type="text"
                class="input"
                id="text-danger1"
                placeholder="Enter lastname"
                name="lname"
              />
              <span class="text-danger" id="t__d1"><?php if(isset($errors['lname'])) echo $errors['lname']; ?></span>
            </div>
            <div class="first-text">
              <p class="danger__gap">Email</p>
              <input
                type="email"
                class="input"
                id="text-danger2"
                placeholder="Enter E-mail"
                name="email"
              />
              <span class="text-danger" id="t__d1"><?php if(isset($errors['email'])) echo $errors['email']; ?></span>
            </div>
            <div class="first-text">
              <p>Age</p>
              <input
                type="text"
                class="input"
                id="text-danger1"
                placeholder="Enter age"
                name="age"
              />
            </div>   
            <div class="first-text">
              <p>Gender</p>
              <input
                type="text"
                class="input"
                id="text-danger1"
                placeholder="Enter gender"
                name="gender"
              />
            </div>           
            <div class="first-text">
              <p>Address</p>
              <input
                type="text"
                class="input"
                id="text-danger1"
                placeholder="Enter address"
                name="address"
              />
            </div>          
            <div class="submit">
              <input
                type="submit"
                id="submit"
                name="Add"
                value="Add"
              />
            </div>
          </form>          
        </div>
      </div>
    </div>
</body>
</html>