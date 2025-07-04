<?php
    include_once "connection.php";

    session_start();
    if($_SESSION['loginEmail']==""){
        header("Location: index.php");
    }

    if(isset($_POST['review-submit']))
    {
        $vname=$_POST['rvname'];
        $date=$_POST['rdate'];
        $name=$_POST['rname'];
        $rating=$_POST['rrating'];
        $review=$_POST['rreview'];
        $remail=$_POST['remail'];

        $ins4="INSERT INTO review SET  
                    review_name = '$name',
                    review_villaname = '$vname',
                    review_date = '$date',
                    review_star = '$rating',
                    review_email = '$remail',
                    review_message = '$review'";

        mysqli_query($con,$ins4);
        header("Location: index.php#review");

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <a href="profile.php">Profile</a>
                <a href="#" class="active">My Trips</a>
                <a href="logout.php">Logout</a>
            </nav>
        </aside>
        <div class="blanknav2"></div>
        <!-- Main Content -->
        <div class="main-content">

        <h1 style="color: #948058; margin-bottom: 30px;">My Bookings</h1>

        <!-- Booking Card -->
        <?php
                
                $sel="SELECT * FROM booking where book_loginemail = '".$_SESSION['loginEmail']."' ORDER BY book_id DESC";
                $exe=mysqli_query($con,$sel);
                while($fetch=mysqli_fetch_assoc($exe)){
                    
                    $indateFromDB = $fetch['book_in']; // e.g. 2025-11-21
                    $timestamp1 = strtotime($indateFromDB); // convert to timestamp
                    $INformattedDate = date('jS M Y', $timestamp1);
                    
                    $reviewCheck = mysqli_query($con, "SELECT * FROM review WHERE review_villaname = '".$fetch['book_vname']."' AND review_email = '".$fetch['book_loginemail']."' ");
                    $hasReviewed = mysqli_num_rows($reviewCheck) > 0;

                    $outdateFromDB = $fetch['book_out']; // e.g. 2025-11-21
                    $timestamp2 = strtotime($outdateFromDB); // convert to timestamp
                    $OUTformattedDate = date('jS M Y', $timestamp2);


                    $diff = strtotime($fetch['book_out']) - strtotime($fetch['book_in']);  // Calculate the difference in seconds
                    $nights = $diff / (60 * 60 * 24);  // Convert seconds to days
        ?>
        <div class="booking-card-container">
            <div class="booking-top">
                <div class="booking-left">
                <div class="booking-title"><?php echo $fetch['book_vname'] ?> <span class="stars">★★★☆☆</span></div>
                <div class="booking-subinfo">
                    <span class="status completed"><?php echo (date("Y-m-d") > $fetch['book_in']) ? "Expired" : "Upcoming"; ?></span> • Resort in Kumbhalgarh • Booking ID - NH<?php echo mt_rand(10000000000000, 99999999999999);  ?>
                </div>
            </div>
            <?php
                if(date("Y-m-d") > $fetch['book_in'] && !$hasReviewed){
            ?>
            <button class="review-btn" onclick="openReviewModal('#review<?php echo $fetch['book_villa']?>')">Share Your Experience</button>
            <?php }?>
            </div>
            <hr class="divider" />

            <div class="booking-bottom">
                <div class="check-details">
                <div class="checkin">
                    <h4>CHECK-IN</h4>
                    <p class="date"><?php echo $INformattedDate ?></p>
                    <span class="time">Check-in from 02:00 PM</span>
                </div>
                <div class="checkout">
                    <h4>CHECK-OUT</h4>
                    <p class="date"><?php echo $OUTformattedDate ?></p>
                    <span class="time">Check-out till 11:00 AM</span>
                </div>
                </div>

                <div class="booking-info">
                <p class="rooms"><i class="fas fa-door-open"></i>  <?php echo $nights ?> Night(s)</p>
                <p class="guests"><i class="fas fa-user-friends"></i> <?php echo $fetch['book_name']  ?> + <?php echo $fetch['book_guests']  ?></p>
                </div>
            </div>
        </div>
        <div class="review-modal" id="review<?php echo $fetch['book_villa']?>">
            <div class="review-modal-content">
            <span class="review-close-btn" onclick="closeReviewModal('#review<?php echo $fetch['book_villa']?>')">&times;</span>
            <h2>Write a Review</h2>
            <form action="" method="post">
            <p style="color:#777;">How would you rate your stay?</p>
            <input type="hidden" name="rvname" value="<?php echo $fetch['book_vname']?>">
            <input type="hidden" name="remail" value="<?php echo $fetch['book_loginemail']?>">
            <input type="date" name="rdate" class="hideDate" value="<?php echo $fetch['book_in']?>">
            <input type="hidden" name="rname" value="<?php echo $fetch['book_name']?>">
            <select name="rrating">
                <option value="" disabled selected>Select Rating</option>
                <option value="5">★★★★★ - Excellent</option>
                <option value="4">★★★★☆ - Good</option>
                <option value="3">★★★☆☆ - Average</option>
                <option value="2">★★☆☆☆ - Poor</option>
                <option value="1">★☆☆☆☆ - Terrible</option>
            </select>
            
            <textarea name="rreview" placeholder="Write your review here..." maxlength="120"></textarea>
            <button name="review-submit" class="submit-review-btn">Submit Review</button>
            </form>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
<script src="script.js"></script>
</html>