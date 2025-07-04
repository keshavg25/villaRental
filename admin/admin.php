<?PHP
    include_once "connection.php";

    $admin_id=$_SESSION['ADMIN'];
    if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }

    if(isset($_POST['add'])){
        $name=$_POST['aname'];
        $phone=$_POST['aphone'];
        $email=$_POST['aemail'];
        $address=$_POST['aaddress'];


        $upd="UPDATE admin_panel SET
                    admin_name='$name' where admin_id = '$admin_id' ";

        mysqli_query($con,$upd);
        
                    



    }
    $sel="SELECT * FROM admin_panel";
        $exe=mysqli_query($con,$sel);
        $fetch=mysqli_fetch_array($exe);
        // echo "<pre>";
        // print_r($fetch);
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
                <form action="" method="post">
                <h2>Admin Info</h2>
                <div class="cp-box">
                    <h5>Admin Name :</h5>
                    <input type="text" name="aname" value="<?php echo $fetch['admin_name']?>" placeholder="About" class="inp">
                    <h5>Admin Email :</h5>
                    <input type="text" name="aemail" value="<?php echo $fetch['admin_email']?>" placeholder="About" class="inp">
                    <h5>Admin Phone :</h5>
                    <input type="text" name="aphone" value="<?php echo $fetch['admin_phone']?>" placeholder="About" class="inp">
                    <h5>Admin Address :</h5>
                    <input type="text" name="aaddress" value="<?php echo $fetch['admin_address']?>" placeholder="About" class="inp mgb-2">
                    <div class="wdi">
                    <input class="cu-btn" type="submit" name="add" value="Update">
                    </div>
                </form>    
    </aside>
</body>
</html>