<?php
error_reporting(0);
    include_once "connection.php";

    if($_SESSION['ADMIN']!=""){
        header("Location:dashboard.php");
    }
    if(isset($_POST['login'])){
        $uname=$_POST['name'];
        $upass=$_POST['pass'];

        $sel="SELECT  * FROM admin_panel where admin_name = '$uname' and admin_pass = '$upass' ";
        $exe=mysqli_query($con,$sel);
        $check=mysqli_num_rows($exe);
        $fetch=mysqli_fetch_array($exe);

        if($check=='1'){
            if($_POST['rem']==1){
                setcookie('USERNAME',$uname,time()+120);
                setcookie('USERPASS',$upass,time()+120);
            }
            $_SESSION['ADMIN']=$fetch['admin_id'];
            header("Location:dashboard.php");
        }

        else{
            $invmsg="Invalid Username And Password....!!";
        }
        
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="preload">
    <?php include "html.php" ?>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login-page">
        <div class="login-box">
            <h2>Villa Admin Login</h2>
            <?php echo "<p class='error-msg'>$invmsg</p>"; ?>

            <form method="post">
            <label>Username</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input type="text" name="name" value="<?php echo $_COOKIE['USERNAME'] ?>" placeholder="Enter username" />
            </div>

            <label>Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input type="password" name="pass" value="<?php echo $_COOKIE['USERPASS'] ?>" placeholder="Enter password" />
            </div>

            <div class="options">
                <label><input type="checkbox" name="rem" value="1"> Remember me</label>
            </div>

            <button type="submit" name="login">Login</button>
            </form>
        </div>
</div>
    
</body>
<link rel="stylesheet" href="1.css">
<style>
    .inp3:hover{
        background: palevioletred;
    }

    .inp{
        color: black;
    }
    
</style>
</html>
