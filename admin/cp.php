<?php 
    include_once "connection.php";

    $adminid=$_SESSION['ADMIN'];
    if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }

    if(isset($_POST['changepass'])){

        $oldpass=$_POST['oldpass'];
        $newpass=$_POST['newpass'];
        $confirmpass=$_POST['confirmpass'];

        $sel="SELECT * FROM admin_panel where admin_pass = '$oldpass' and admin_id = '$adminid' ";
        $exe=mysqli_query($con,$sel);
        $check=mysqli_num_rows($exe);

        if($check==1){
            if($newpass==$confirmpass && $newpass!="" && $confirmpass!=""){
                $upd="UPDATE admin_panel SET
                            admin_pass = '$newpass' where admin_id = '$adminid' ";
                
                mysqli_query($con,$upd);
                $msg3="YOUR PASSWORD HAS BEEN SUCCESSFULLY UPDATED!!!!!";
            }
            elseif($newpass=="" && $confirmpass==""){
                $msg4="PLEASE ENTER THE NEW PASSWORD........";
            }
            else{
                $msg2="NEW AND CONFIRM PASSWORD NOT MATCHED.......";
            }
        }
        else{
            $msg1="OLD PASSWORD NOT MATCHED........";
        }

    }
?>
<?php
include_once "html.php";
?>
<body>
    <header>
        <?php
          include_once "header.php";
        ?>
    </header>
    <aside>
        <div class="all-main">
            <?php
                include_once "la.php";
            ?>
            <div class="right-aside">
                <h2>Change Password:</h2>
                <form method="post">
                <div class="cp-box">
                    <div class="text-danger">
                        <?php
                            echo "<h4>".$msg1;
                        ?>
                    </div>
                    <div class="text-danger">
                        <?php
                            echo "<h4>".$msg2;
                        ?>
                    </div>
                    <div class="text-danger">
                        <?php
                            echo "<h4>".$msg4;
                        ?>
                    </div>
                    <div class="text-success">
                        <?php
                            echo "<h4>".$msg3;
                        ?>
                    </div>
                    <h5>Old Password :</h5>
                    <input class="inp" name="oldpass" type="password">
                    <h5>New Password :</h5>
                    <input class="inp" name="newpass" type="password">
                    <h5>Confirm Password :</h5>
                    <input class="inp" name="confirmpass" type="password">
                    <input class="cp-btn" type="submit" name="changepass" value="Change Password">
                </div>
                </form>
            </div>
        </div>
    </aside>
</body>
</html>