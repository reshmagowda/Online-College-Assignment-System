<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $rollmobilenum=$_POST['rollmobilenum'];
    $mobnum=$_POST['mobnum'];
    $password=md5($_POST['password']);
    $sql ="SELECT RollNumber,MobileNumber,Password,ID,Cid FROM tbluser WHERE (RollNumber=:rollmobilenum || MobileNumber=:rollmobilenum) and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':rollmobilenum',$rollmobilenum,PDO::PARAM_STR);
    $query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['ocasuid']=$result->ID;
$_SESSION['ocasucid']=$result->Cid;
}
$_SESSION['login']=$_POST['rollmobilenum'];

echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>OCAS User : Login</title>
    
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="../index.php"><span>OCAS User</span></a>
                        </div>
                        <div class="login-form">
                            <h4>User Login</h4>
                            <form method="post">
                                <div class="form-group">
                                    <label>Roll Number or Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="Roll Number or Mobile Number" required="true" name="rollmobilenum">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                                </div>
                                <div class="checkbox">
                                    
                                    <label class="pull-right">
										<a href="forgot-password.php">Forgotten Password?</a>
									</label>

                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>

                                <div class="register-link m-t-15 text-center">
                                    <p>Create an account ? <a href="signup.php"> Sign up</a></p>
                                </div>
                                <label>
                                        <a href="../index.php">Back Home!!</a>
                                    </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>