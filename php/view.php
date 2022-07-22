<?php
include_once("../user/user.php");
include_once('../classes/view.class.php');
if(isset($_POST['ok'])) {
    header ('location:index.php');
}
$empId = $_REQUEST['emp'];
$view = new View();
$result = $view->viewTask($empId);
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
            <h2 class="heading">Edit employees here</h2>           
          </div>
          <form
            action="view.php?emp=<?php echo $empId; ?>"
            method="POST"
            enctype="multipart/form-data"
            class="form"
            id="myform1"
          >
          <?php while ($res = $result->fetch()) { ?> 
            <div class="first-text">
              <p>Firstname</p>
              <input
                type="text"
                class="input"
                id="text-danger1"
                placeholder="Enter firstname"
                name="fname"
                value="<?php echo $res['first_name']; ?>" readonly
                
              />              
            </div>
            <div class="first-text">
              <p>Lastname</p>
              <input
                type="text"
                class="input"
                id="text-danger1"
                placeholder="Enter lastname"
                name="lname"
                value="<?php echo $res['last_name']; ?>" readonly
              />              
            </div>
            <div class="first-text">
              <p class="danger__gap">Email</p>
              <input
                type="email"
                class="input"
                id="text-danger2"
                placeholder="Enter E-mail"
                name="email"
                value="<?php echo $res['email']; ?>" readonly
              />              
            </div>
            <div class="first-text">
              <p>Age</p>
              <input
                type="text"
                class="input"
                id="text-danger1"
                placeholder="Enter age"
                name="age"
                value="<?php echo $res['age']; ?>" readonly
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
                value="<?php echo $res['gender']; ?>" readonly
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
                value="<?php echo $res['address']; ?>" readonly
              />
            </div>          
            <div class="submit form--btn">
              <input
                type="submit"
                id="submit"
                class="btn"
                name="ok"
                value="ok"
              />
            </div>
            <?php } ?>
          </form>          
        </div>
      </div>
    </div>
</body>
</html>