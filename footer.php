<?php

    $sel9="SELECT * FROM contact";
    $exe9=mysqli_query($con,$sel9);
    $fetch9=mysqli_fetch_assoc($exe9);

?>      
      
      <div class="links">
            <div class="col1">
                <img class="" src="images/logo6.PNG" alt="">
            </div>
            <div class="col2">
                <p><a href="index.php#navigation">NAVIGATION</a></p>
                <p><a href="index.php#rooms">Properties</a></p>
                <p><a href="gallery.php">Gallery</a></p>
                <p><a href="privacy.php">Privacy policy</a></p>
                <p><a href="terms.php">Terms and Conditions</a></p>
            </div>
            <div class="col3 col2">
                <p>CONTACT US</p>
                <p><i class="fa-solid fa-phone"></i> &nbsp;&nbsp;&nbsp;<?php echo $fetch9['cp_phone'] ?></p>
                <p><i class="fa-regular fa-envelope"></i> &nbsp;&nbsp;&nbsp;<?php echo $fetch9['cp_email'] ?></p>
                <p><i class="fa-brands fa-instagram"></i> &nbsp;&nbsp;&nbsp;<?php echo $fetch9['cp_insta'] ?></p>
                <p><?php echo $fetch9['cp_address'] ?></p>
            </div>
        </div>
        <div class="copyRight">
            Copyright © 2022 | Website made by Keshav 🚀 
        </div>