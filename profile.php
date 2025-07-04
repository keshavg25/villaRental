<?php
    include_once "connection.php";

    session_start();
    if($_SESSION['loginEmail']==""){
        header("Location: index.php");
    }

    if(isset($_POST['updateProfile'])){
        $fname=$_POST['pfname'];
        $lname=$_POST['plname'];
        $pass=$_POST['ppass'];
        $address=$_POST['paddress'];
        $birthdate=$_POST['pdate'];
        $mstatus=$_POST['pmstatus'];
        $gender=$_POST['pgender'];


        $upd="UPDATE reg SET
                    reg_fname='$fname',
                    reg_lname='$lname',
                    reg_pass='$pass',
                    reg_address='$address',
                    reg_birth='$birthdate',
                    reg_mstatus='$mstatus',
                    reg_gender='$gender'    where reg_user = '".$_SESSION['loginEmail']."'";

        mysqli_query($con,$upd);


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Escape Bay</title>
    <link rel="stylesheet" href="res.css">
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.20/dist/lenis.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include_once "navbar.php";
    ?>
    <div class="blanknav"></div>
    <?php 
        $sel="SELECT * FROM reg where reg_user = '".$_SESSION['loginEmail']."'";
        $exe=mysqli_query($con,$sel);
        $fetch=mysqli_fetch_assoc($exe);
                        
     ?>
    <!-- Sidebar -->
     <div class="profile-body">
        <aside class="sidebar">
            <div class="profile-picture">
            <?php echo ucfirst($fetch['reg_fname'][0]).ucfirst($fetch['reg_lname'][0]);?>
            </div>
            <div class="profile-name"><?php echo $fetch['reg_fname']." ".$fetch['reg_lname'];?></div>
            <div class="profile-role">Personal Profile</div>

            <nav class="menu">
            <a href="#" class="active">Profile</a>
            <a href="bookings.php">My Trips</a>
            <a href="logout.php">Logout</a>
        </nav>
    </aside>
    <div class="blanknav2"></div>
    <!-- Main Content -->
    <main class="main-content">
        <div class="profile-header">
            <h1>Profile</h1>
            <p>Basic info, for a faster booking experience</p>
        </div>
        <form action="" method="post">
        <div class="profile-info">
            <div class="info-row">
                <div class="info-label">First Name</div>
                <div class="info-value"><input type="text" name="pfname" value="<?php echo $fetch['reg_fname'] ?>"></div>
            </div>
            <div class="info-row">
                <div class="info-label">Last Name</div>
                <div class="info-value"><input type="text" name="plname" value="<?php echo $fetch['reg_lname'] ?>"></div>
            </div>
            <div class="info-row">
                <div class="info-label">Password</div>
                <div class="info-value"><input type="text" name="ppass" placeholder="Enter Password" value="<?php echo $fetch['reg_pass'] ?>"></div>
            </div>
            <div class="info-row">
                <div class="info-label">Birthday</div>
                <div class="info-value"><input type="date" value="<?php echo $fetch['reg_birth'] ?>" class="infoValueDate" name="pdate"></div>
            </div>
            <div class="info-row">
                <div class="info-label">Gender</div>
                <div class="info-value">
                <select name="pgender" class="infoValueSelect">
                    <option value="">Select Gender</option>
                    <option value="Male" <?php if ($fetch['reg_gender'] == "Male") echo "selected"; ?>>Male</option>
                    <option value="Female" <?php if ($fetch['reg_gender'] == "Female") echo "selected"; ?>>Female</option>
                    <option value="Other" <?php if ($fetch['reg_gender'] == "Other") echo "selected"; ?>>Other</option>
                </select>
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Marital Status</div>
                <div class="info-value"><input type="text" name="pmstatus" value="<?php echo $fetch['reg_mstatus'] ?>" placeholder="Enter Marital Status"></div>
            </div>
            <div class="info-row">
                <div class="info-label">Your Address</div>
                <div class="info-value"><input type="text" name="paddress" value="<?php echo $fetch['reg_address'] ?>" placeholder="Enter Address"></div>
            </div>

            <button type="submit" name="updateProfile" class="update-button">Update</button>
            </form>    
        </div>
        </main>
     </div>
</body>
</html>