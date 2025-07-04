<?php
    include_once "connection.php";

    $err2msg=$_GET['b1message'];
    $suc2msg=$_GET['b2message'];
    
    session_start();

    if(isset($_POST['book'])){
        $bvillano=$_POST['cvillano'];
        $bvillaname=$_POST['cvillaname'];
        $bvillalogin=$_POST['cvillalogin'];
        $bcheckin=$_POST['ccheckin'];
        $bcheckout=$_POST['ccheckout'];
        $bguests=$_POST['cguests'];
        $bname=$_POST['cname'];
        $bphone=$_POST['cphone'];
        $bemail=$_POST['cemail'];
        $bamt=$_POST['camt'];
        

        $sel3="SELECT * FROM booking where book_villa = '$bvillano' AND (book_in < '$bcheckout' AND book_out > '$bcheckin')";
        $exe3=mysqli_query($con,$sel3);
        $check3=mysqli_num_rows($exe3);

        if($_SESSION['loginID']=="")
        {
            $error3_msg = urlencode("YOU HAVE TO LOGIN OR REGISTER ON THIS WEBSITE FIRST  !");
            header("Location: index.php?b1message=$error3_msg#rooms");

        }
        else{
            if($check3!=0)
            {
                $error3_msg = urlencode("SORRY, WE HAVE BEEN BOOKED ON THIS DAY, TRY A NEW DATE  !");
                header("Location: index.php?b1message=$error3_msg#rooms");
            }
            else{
                $ins3="INSERT INTO booking SET
                            book_villa='$bvillano',
                            book_vname='$bvillaname',
                            book_loginemail='$bvillalogin',
                            book_in='$bcheckin',
                            book_out='$bcheckout',
                            book_guests='$bguests',
                            book_name='$bname',
                            book_phone='$bphone',
                            book_email='$bemail',
                            book_amt='$bamt'";
    
                mysqli_query($con,$ins3);
                $suc3_msg = urlencode("CONGRATS YOUR BOOKING HAS BEEN DONE , ENJOY YOUR STAY  !");


                //sending the booking confirmation mail
                $to= $bemail;
                $subject= 'Get Ready for Paradise! Your Booking is Confirmed 🌴';
                $message= "<html>
                            <head>
                            <title>Booking Confirmation - EscapeBay Travel</title>
                            </head>
                            <body style='margin:0; padding:0; background-color:#f0f0f5; font-family: Arial, sans-serif;'>

                            <div style='max-width:600px; margin:40px auto; background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08);'>

                                <!-- Logo Header -->
                                <div style='background:linear-gradient(to right, #948058, #948058a1); text-align:center;'>
                                <img src='https://i.postimg.cc/bJqTxH2r/logo6.png' alt='EscapeBay Travel' style='max-width:200px; height:auto; overflow: hidden;'>
                                </div>

                                <!-- Hero Image -->
                                <img src='https://i.postimg.cc/d1Syh82z/1.jpg' alt='Villa View' style='width:100%; max-height:250px; object-fit:cover;'>

                                <!-- Booking Info -->
                                <div style='padding:30px;'>

                                <h2 style='color:#bfa046; text-align:center;'>🌴 Your Escape Awaits, $bname!</h2>
                                <p style='color:#333; font-size:15px; text-align:center;'>We're thrilled to confirm your booking with <strong>EscapeBay Travel</strong>.</p>

                                <div style='margin-top:25px; background:#f9f9f9; padding:20px; border-radius:10px;'>
                                    <table style='width:100%; font-size:14px; color:#555;'>
                                    <tr>
                                        <td><strong>👤 Guest Name:</strong></td>
                                        <td>$bname</td>
                                    </tr>
                                    <tr>
                                        <td><strong>🗓 Check-in:</strong></td>
                                        <td>$bcheckin</td>
                                    </tr>
                                    <tr>
                                        <td><strong>🗓 Check-out:</strong></td>
                                        <td>$bcheckout</td>
                                    </tr>
                                    <tr>
                                        <td><strong>🛏 No. of Guests:</strong></td>
                                        <td>$bguests</td>
                                    </tr>
                                    </table>
                                </div>

                                <!-- Total Amount Section -->
                                <div style='margin-top:30px; text-align:center; background:#fffbe6; padding:20px; border: 2px dashed #bfa046; border-radius:12px;'>
                                    <h3 style='color:#bfa046; margin:0;'>Total Due at Property</h3>
                                    <p style='font-size:24px; font-weight:bold; color:#333;'>₹$bamt</p>
                                </div>

                                <!-- Footer -->
                                <div style='margin-top:30px; font-size:13px; color:#666; text-align:center;'>
                                    <p>For any inquiries, call us at <strong>0291-2468122</strong> or simply reply to this email.</p>
                                    <p>We look forward to hosting you!</p>
                                    <p style='margin-top:20px;'>– The EscapeBay Team</p>
                                    <p><a href='http://localhost/villarental/' style='color:#bfa046; text-decoration:none;'>www.EscapeBayTravel.com</a></p>
                                </div>

                                </div>
                            </div>

                            </body>
                            </html>

                            ";
                $headers  = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                $headers .= "From: EscapeBay Travel <theescapebay.travel@gmail.com>" . "\r\n";
                $headers .= "Reply-To: theescapebay.travel@gmail.com" . "\r\n";
                $headers .= "X-Mailer: PHP/" . phpversion();
                mail($to, $subject, $message, $headers);
                
                
                
                
                header("Location: index.php?b2message=$suc3_msg#rooms");
            }

        }
    }




    if(isset($_POST['enquire']))
    {
        $ename=$_POST['eqname'];
        $ephone=$_POST['eqphone'];
        $eemail=$_POST['eqemail'];
        $emessage=$_POST['eqmessage'];

        $ins4="INSERT INTO enquiry SET  
                    e_name = '$ename',
                    e_phone = '$ephone',
                    e_email = '$eemail',
                    e_message = '$emessage'";

        mysqli_query($con,$ins4);



                //sending the enquiry confirmation mail
                $to= $eemail;
                $subject= 'Your Response Submitted For Booking Enquiry';
                $message= "<html>
                            <head>
                            <title>Booking Enquiry</title>
                            </head>
                            <body>
                                <p>
                                Hello $ename,<br>
                                Just to confirm we have received your inquiry, We will get back to you as soon as possible!
                                </p>
                            </body>
                            </html>
                            ";
                $headers  = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                $headers .= "From: EscapeBay Travel <theescapebay.travel@gmail.com>" . "\r\n";
                $headers .= "Reply-To: theescapebay.travel@gmail.com" . "\r\n";
                $headers .= "X-Mailer: PHP/" . phpversion();
                mail($to, $subject, $message, $headers);




        header("Location: index.php#contact");

    }


    if(isset($_POST['escape'])){
        
        $checkin=$_POST['echeckin'];
        $checkout=$_POST['echeckout'];

        $sel11="SELECT * FROM booking where book_villa = '1' AND (book_in < '$checkout' AND book_out > '$checkin')";
        $exe11=mysqli_query($con,$sel11);
        $check11=mysqli_num_rows($exe11);

        $sel12="SELECT * FROM booking where book_villa = '2' AND (book_in < '$checkout' AND book_out > '$checkin')";
        $exe12=mysqli_query($con,$sel12);
        $check12=mysqli_num_rows($exe12);

        $sel13="SELECT * FROM booking where book_villa = '4' AND (book_in < '$checkout' AND book_out > '$checkin')";
        $exe13=mysqli_query($con,$sel13);
        $check13=mysqli_num_rows($exe13);

        header("Location: index.php#rooms");

    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Escape Bay</title>
    <link rel="stylesheet" href="res.css?v=2">
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.20/dist/lenis.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <div id="scroll-indicator" class="scroll-indicator">
    <div class="scroll-icon">
        <svg xmlns="http://www.w3.org/2000/svg" class="scroll-svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </div>
    </div>
    <div id="background"></div>
    <div class="main">
        <?php
            include_once "login.php";
        ?>
        <div class="page1" id="page1">
            <?php
                include_once "navbar.php";
            ?>
            <div class="blanknav"></div>
            <div class="enquirydate">
                <div class="enquirytext">
                    <h1>YOUR NEXT ESCAPE</h1>
                    <h2>Simple, Secure, and Stress Free – Booking Your Dream Villa is Just a Click Away</h2>
                </div>
                <form action="" method="post">
                <div class="calendar-container">
                        <!-- <h5>CHECK-IN Date </h5> -->
                        <input type="text" class="date-picker cinp" id="date-picker" name="echeckin" placeholder="Check-In-Date" onfocus="this.type='date'">
                        <!-- <h5>CHECK-OUT DATE </h5> -->
                        <input type="text" class="date-picker2 cinp" id="date-picker2" name="echeckout" placeholder="Check-Out-Date" onfocus="this.type='date'">
                        <select id="city-select" class="city-select" name="city">
                            <option value="default" class="cinzel" disabled selected>No. Of Guests</option>
                            <option value="default" class="cinzel">1</option>
                            <option value="city1" class="cinzel">2</option>
                            <option value="city2" class="cinzel">3</option>
                            <option value="city3" class="cinzel">3+</option>
                        </select>
                            <button type="submit" name="escape" class="search-button" onclick="searchFunction()" >
                                <i class="fa-solid fa-person-running"></i>                           
                                Escape
                            </button> 
                    </div>
                </form>
            </div>
        </div>
        <div class="page2">
            <div class="p2content">
                <h1 id="p1">OUR FEATURED VILLA'S</h1>
                <h2>Hand-picked selection of quality places</h2>
            </div>
            <div class="cardContainer" id="rooms">
                 <?php 
                    $sel15="SELECT * FROM reg where reg_user = '".$_SESSION['loginEmail']."'";
                    $exe15=mysqli_query($con,$sel15);
                    $fetch15=mysqli_fetch_assoc($exe15);
                                    
                ?>                
                <?php 
                    $sel5="SELECT * FROM villa where villa_status = '1'";
                    $exe5=mysqli_query($con,$sel5);
                    while($fetch5=mysqli_fetch_assoc($exe5)){
                        
                ?>
                <div class="card card<?php echo $fetch5['villa_id'] ?>" style="background-image: url('gallery-store/<?php echo $fetch5['villa_imagem'] ?>')">
                        <div class="card__content">
                            <p class="card__title cinzel"><?php echo $fetch5['villa_name'] ?></p>
                            <button class="book-btn animation" onclick="openBookingContainer('#villa<?php echo $fetch5['villa_id'] ?>')">
                                <span class="book-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor"
                                        class="bi bi-airplane-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="text">Book Now</span>
                            </button>
                        </div>
                    </div>
                    <div class="mmaingallery">
                        <div class="mainGallery" id="villa<?php echo $fetch5['villa_id'] ?>">
                            <button class="buttonclosegallery" onclick="closeBookingContainer('#villa<?php echo $fetch5['villa_id'] ?>')">
                                <span class="X2"></span>
                                <span class="Y2"></span>
                                <div class="close2">Close</div>
                            </button>
                            <div class="mainGalleryLeft">
                                <div class="slider-container">
                                    <div class="slides">
                                        <div class="slide"><img src="gallery-store/<?php echo $fetch5['villa_image1'] ?>" alt="Slide 1" width="100%" height="100%"></div>
                                        <div class="slide"><img src="gallery-store/<?php echo $fetch5['villa_image2'] ?>" alt="Slide 2" width="100%" height="100%"></div>
                                        <div class="slide"><img src="gallery-store/<?php echo $fetch5['villa_image3'] ?>" alt="Slide 3" width="100%" height="100%"></div>
                                    </div>
                                    <div class="buttons">
                                        <button onclick="prevSlide()">&#10094;</button>
                                        <button onclick="nextSlide()">&#10095;</button>
                                    </div>
                                    <div class="dots"></div>
                                </div>
                            </div>
                            <div class="mainGalleryRight">
                                <div class="booking-card">
                                    <form action="" method="post">
                                    <input type="hidden" name="cvillano" value="<?php echo $fetch5['villa_id'] ?>">
                                    <input type="hidden" name="cvillaname" value="<?php echo $fetch5['villa_name'] ?>">
                                    <input type="hidden" name="cvillalogin" value="<?php echo $fetch15['reg_user'] ?>">
                                    <div class="top-section">
                                        <div class="price">
                                            <span class="old-price">₹<?php echo $fetch5['villa_price'] ?></span> 
                                            <span class="new-price">₹<?php echo($fetch5['villa_price']-$fetch5['villa_discount'])?> per night</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="text-danger">
                                            <?php echo $err2msg ?>
                                        </h4>
                                    </div>
                                    <div>
                                        <h4 class="text-green">
                                            <?php echo $suc2msg ?>
                                        </h4>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="checkin" class="checkInBooking">Check-in</label>
                                            <input type="date" id="checkin" class="checkInBookingInput" name="ccheckin" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="checkout" class="checkOutBooking">Check-out</label>
                                            <input type="date" id="checkout" class="checkOutBookingInput" name="ccheckout" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="guests">Guests(Each Room)</label>
                                            <select id="guests" name="cguests" required>
                                                <option value="default" disabled selected>No. Of Guests</option>
                                                <option value="1">1 guest</option>
                                                <option value="2">2 guests</option>
                                                <option value="3">3 guests(max)</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" placeholder="Enter name" name="cname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="tel" id="phone" placeholder="Enter phone" name="cphone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" placeholder="Enter email" name="cemail" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="camt" class="finalAmtInput">
                                    <input type="submit" class="reserve-btn" value="Reserve" name="book">
                                    <div class="price-breakdown">
                                        <span class="fweight">₹<?php echo $fetch5['villa_price'] ?> x <span class="nightStand">1</span> nights <span
                                                style="float:right;" class="ActualPrice">₹<?php echo $fetch5['villa_price'] ?></span></span>
                                        <p class="special-offer">Special offer <span style="float:right;"
                                                class="TotalDiscount">-₹<?php echo $fetch5['villa_discount'] ?></span></p>
                                        <hr>
                                        <p class="total">Total before taxes <span style="float:right;" class="finalAmt">₹<?php echo($fetch5['villa_price']-$fetch5['villa_discount'])?></span>
                                        </p>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                        }

                    ?>
                </div>
        </div>
        <div class="page2b">
            <h1>Benefits of Booking Direct</h1>
            <h2>When booking direct with us, you cut out the fees and enjoy the best rates for all of our Escapes!</h2>
            <h2>Best Price  |
                Priority Service  |
                Exclusive Specials</h2>
        </div>
        <div class="page3">
            <div class="amenities">
                <aside class="rside">
                    <h1>Serene Retreat</h1>
                    <p>End your day with a home-cooked meal in our fully equipped kitchen, or head out to discover the local restaurants and coffee shops just a short drive away. Recharge with a fire pit on the dock under the stars followed by a restful sleep.</p>
                    <a href="index.php#rooms" style="text-decoration: none;">
                        <button class="search-button am-btn" onclick="searchFunction()">                           
                            Book Now
                        </button>
                    </a> 
                </aside>
                <aside class="lside">
                    <img src="images/11.jpg" alt="">
                </aside>
            </div>
            <div class="amenities">
                <aside class="lside">
                    <img src="images/poolside3.jpg" alt="">
                </aside>
                <aside class="rside">
                    <h1>Swimming Pool</h1>
                    <p>Our pool is the perfect antidote for all the exhausted souls to laze around after a hectic day of traveling. Dive into the glistening water to beat the scorching summer heat with a glass of your favorite drink and watch the sky change its colors. Sounds heavenly, no?</p>
                    <a href="index.php#rooms" style="text-decoration: none;">
                        <button class="search-button am-btn" onclick="searchFunction()">                           
                            Book Now
                        </button>
                    </a> 
                </aside>
            </div>
            <div class="amenities">
                <aside class="rside">
                    <h1>Gym & Fitness Center</h1>
                    <p>Our dedicated fitness & Gym Center is equipped with top-of-the range Techno gym exercise equipment.
                        
                        Our gym includes a programmable treadmill, cross-trainer, life cycle, concept rower, free weights, multi-adjustable bench and freestanding pulley...</p>
                        <a href="index.php#rooms" style="text-decoration: none;">
                            <button class="search-button am-btn" onclick="searchFunction()">                           
                                Book Now
                            </button>
                        </a> 
                    </aside>
                <aside class="lside">
                    <img src="images/gym.jpg" alt="">
                </aside>
                </div>
        </div>
        <div class="contact">
            <h1>CONTACT US</h1>
            <h3 id="contact">Interested ?</h3>
            <p style="color: grey;">Fill out the form below and we’ll reach out to you soon!                
            </p>
            <form action="" method="post" class="con-form">
                <input type="text" name="eqname" class="coninp"  id="" placeholder="NAME" required>
                <input type="text" name="eqphone" class="coninp"  id="" placeholder="PHONE NUMBER" required>
                <input type="email" name="eqemail" class="coninp"  id="" placeholder="EMAIL" required>
                <textarea name="eqmessage" id="" placeholder="MESSAGE" required></textarea>
                <div>
                    <input type="submit" name="enquire" value="Enquire" class="search-button">
                </div>
            </form>
        </div>
        <footer>
            <div class="footer" >
                <div class="footerleft">
                    <div class="footerhead ">
                        <div class="one" id="navigation">
                            <div class="hyphen"></div>
                            <h1 class="cinzel">Location &</h1>
                        </div>
                        <div class="two">
                            <h1 class="cinzel">Directions</h1>
                        </div>
                    </div>
                    <div class="lefttext">
                        <div class="cinzel cp ani" id="site1">Glambirds Stay</div>
                        <div class="cinzel cp ani" id="site2">Valley Views</div>
                        <div class="cinzel cp ani" id="site3">Igloo Homes</div>
                    </div>
                </div>
                <div class="footerright" >
                    <div class="map">
                        <div class="mapwrapper">
                            <!-- Map 1 -->
                            <iframe id="map1" class="map1"
                            
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3422.957431872058!2d77.10109657528523!3d30.915813976762095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f814d7b3958db%3A0x9ea156127ce7934f!2sThe%20Luxury%20Stays%20by%20Glambirds!5e0!3m2!1sen!2sin!4v1744620514822!5m2!1sen!2sin"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>

                            <!-- Map 2 -->
                            <iframe id="map2" class="map2"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.9329683935225!2d91.77126028035697!3d26.198858731325792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a59504b769669%3A0x81f19d28c2fd6d75!2sFlorence%20Littoral%20Boutique%20BnB!5e0!3m2!1sen!2sin!4v1744621119777!5m2!1sen!2sin"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>

                            <!-- Map 3 -->
                            <iframe id="map3" class="map3"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d432819.2871270063!2d76.76250631735199!3d32.058409848996284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39046340d69c9869%3A0x3c045254606a5776!2sGlampEco%20Stays%3A%20India&#39;s%20First%20Unique%20Luxury%20Glamping%20Dome%20Stay%20in%20Sethan%2C%20Hamta%20Manali!5e0!3m2!1sen!2sin!4v1744621445179!5m2!1sen!2sin"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="review">
            <section class="reviewSection">
                <div class="review-container">
                <h2 class="section-title" >Our clients feedback</h2>
                <div id="review"></div>
                <p class="section-description" >Discover what our clients have to say about their experiences with our villas.</p>
                <div class="testimonial-wrapper" id="testimonialWrapper">
                <?php
                
                        $sel20="SELECT * FROM review ORDER BY review_id DESC";
                        $exe20=mysqli_query($con,$sel20);
                        while($fetch20=mysqli_fetch_assoc($exe20)){
                            
                            $nameParts = explode(" ", $fetch20['review_name']);
                ?>
                    <div class="testimonial-card">
                    <div class="testimonial-user">
                        <div class="imgBox"><?php echo strtoupper($nameParts[0][0] . $nameParts[1][0]);?></div>
                        <div class="testimonial-user-info">
                        <strong><?php echo $fetch20['review_name'] ?></strong>
                        <div class="reviewStars">
                            <?php
                                $totalStar=5;
                                $reviewStar=$fetch20['review_star'];
                                for($i=1;$i<=$reviewStar;$i++){
                                    echo "★";
                                }
                                for($i=1;$i<=($totalStar-$reviewStar);$i++){
                                    echo "☆";
                                }
                            ?>
                        </div>
                        </div>
                    </div>
                    <p class="testimonial-text"><?php echo $fetch20['review_message'] ?></p>
                    <div class="testimonial-meta"><?php echo $fetch20['review_villaname'] ?> — <?php echo $fetch20['review_date'] ?></div>
                    </div>
                <?php }?>
                </div>

                <div class="slider-buttons">
                    <button onclick="prevReview()">&larr;</button>
                    <button onclick="nextReview()">&rarr;</button>
                </div>
                </div>
            </section>               
        </div>
        <div class="faq">
            <div class="faq-section">
                <div class="faq-title">Frequently Asked Questions</div>

                <?php

                    $sel21="SELECT * FROM faq where faq_status = '1'";
                    $exe21=mysqli_query($con,$sel21);
                    while($fetch21=mysqli_fetch_assoc($exe21)){

                ?>               
                <div class="faq-item">
                    <div class="faq-question">
                        <?php echo $fetch21['faq_question'] ?> <span>+</span>
                    </div>
                    <div class="faq-answer">
                        <?php echo $fetch21['faq_answer'] ?>
                    </div>
                </div>
                <?php } ?>
            </div>                
        </div>
        <?php
            include_once "footer.php";
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        var user = <?php echo json_encode($_SESSION['loginID']); ?>;
        console.log(user);
        var bookerr = <?php echo json_encode($err2msg); ?>;
        console.log(bookerr);
        var booksuc = <?php echo json_encode($suc2msg); ?>;
        console.log(bookerr);
    </script>
</body>

</html>