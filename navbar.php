<nav class="navbar">
                <div class="bottomline"></div>
                <div class="logo navelems">
                    <img class="logoimg" src="images/logo6.PNG" alt="">
                </div>
                <ul>
                    <li class="navelems"><a href="index.php" class="cinzel">Home</a></li>
                    <li class="navelems"><a href="index.php#rooms" class="cinzel">Villa's</a></li>
                    <li class="navelems"><a href="index.php#contact" class="cinzel">Contact</a></li>
                    <li class="navelems"><a href="gallery.php" class="cinzel">Gallery</a></li>
                    <?php
                        if($_SESSION['loginID']!="")
                        {
                    ?>        
                            <div class="dropdown-wrapper">
                                <i class="fa-solid fa-circle-user user-icon"></i>
                                <div class="dropdown">
                                <div class="username">Hello, <?php echo $_SESSION['loginID'] ?></div>
                                <a href="profile.php"> My Profile</a>
                                <a href="bookings.php">My Trips</a>
                                <a href="logout.php">Logout</a>
                                </div>
                            </div>
                    <?php        
                        }
                        else{
                    ?>
                            <div class="LoginBtnAnimDiv">
                                <button class="btn loginbtn">
                                    <div class="cinzel">Login</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"
                                        fill="none">
                                        <path d="M11.6801 14.62L14.2401 12.06L11.6801 9.5" stroke="black" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4 12.0601H14.17" stroke="black" stroke-width="2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 4C16.42 4 20 7 20 12C20 17 16.42 20 12 20" stroke="black" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            
                    <?php    
                        }
                    ?>
                </ul>
</nav>