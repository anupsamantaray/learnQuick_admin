<?php 
include_once('classes/config.php');
include_once('classes/admin.php');
$obj=new Admin();
if($obj->isAdminLoggedIn())
{
  header("Location: index.php");
  exit(0);
}

$error = false;
$err_msg="";

date_default_timezone_set('Asia/Kolkata');
$date = date("d:m:Y");

if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
 
if($username == "" || $password == "")
{
  $error=true;
  $err_msg="please enter Username/Password";
}elseif (!$obj->chkValidAdminLogin($username,$password)) {
  $error=true;
  $err_msg="Please Enter Valid Details";
}
 
if(!$error)
{

 if($obj->doAdminLogin($username))
{
  header('location: index.php');
}
 else
{
  $error = true;
  $err_msg = "The username or password you entered is invalid, please try again.";
}
} 

}

?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
  <title>SCHOOL ADMIN</title>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/login.css" rel="stylesheet" type="text/css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>



</head>
<body>

  <div class="container">

    <div class="row" id="pwd-container">
      <div class="col-md-4"></div>

      <div class="col-md-4">
        <section class="login-form">
          <form method="post" action="#" role="login">
            <img src="images/admin.jpg" class="img-responsive" alt="" />
            <p><?php echo $err_msg; ?></p>
            <input type="text" name="username" placeholder="Enter Username" required class="form-control input-lg"/>

            <input type="password" class="form-control input-lg" id="password" name="password" placeholder=" Enter Password" required="" />


            <div class="pwstrength_viewport_progress"></div>


            <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
            
      	<!--	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Forgotten your password?</a>-->
          </form>


        </section>  

      </div>
      

      

    </div>

    


  </div>

</body>
</html>