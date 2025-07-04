<?php


    $UserId=$_GET['userid'];



    if(isset($_POST['signUp']))
    {
        $semail=$_POST['siemail'];
        $spass=$_POST['sipassword'];
        $sfname=$_POST['sifname'];
        $slname=$_POST['silname'];

        // Use prepared statement to check if email exists
        $stmt = $con->prepare("SELECT * FROM reg WHERE reg_user = ?");
        $stmt->bind_param("s", $semail);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $error1_msg = urlencode("THIS EMAIL ID IS ALREADY REGISTERED  !");
            header("Location: index.php?emessage=$error1_msg");
            exit();
        } else {
            $success_msg = urlencode("CONGRATS YOU HAVE BEEN REGISTERED SUCCESSFULLY!");
            // Hash the password before storing
            $hashed_pass = password_hash($spass, PASSWORD_DEFAULT);
            $stmt2 = $con->prepare("INSERT INTO reg (reg_user, reg_pass, reg_fname, reg_lname) VALUES (?, ?, ?, ?)");
            $stmt2->bind_param("ssss", $semail, $hashed_pass, $sfname, $slname);
            $stmt2->execute();
            $to= 'gangwanikeshav2005@gmail.com';
            $subject= 'cool subject';
            $message= 'Hello, this is a test email';
            $headers = 'From: theescapebay.travel@gmail.com' . "\r\n" .
                        'Reply-To: theescapebay.travel@gmail.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
            header("Location: index.php?smessage=$success_msg");
            exit();
        }
    }


    if(isset($_POST['logIn']))
    {
        $lemail = $_POST['liemail'];
        $lpass = $_POST['lipass'];

        // Use prepared statement to fetch user by email
        $stmt = $con->prepare("SELECT * FROM reg WHERE reg_user = ? LIMIT 1");
        $stmt->bind_param("s", $lemail);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($user = $result->fetch_assoc()) {
            // Verify password
            if (password_verify($lpass, $user['reg_pass'])) {
                $_SESSION['loginID'] = $user['reg_fname'];
                $_SESSION['loginEmail'] = $user['reg_user'];
                $logIN = $_SESSION['loginID'];
                header("Location: index.php?userid=$logIN");
                exit();
            } else {
                $error2_msg = urlencode("INVALID EMAIL ID AND PASS  !");
                header("Location: index.php?emessage=$error2_msg");
                exit();
            }
        } else {
            $error2_msg = urlencode("INVALID EMAIL ID AND PASS  !");
            header("Location: index.php?emessage=$error2_msg");
            exit();
        }
    }




    $sucmsg=$_GET['smessage'];
    $errmsg=$_GET['emessage'];
?>

<div class="loginWrapper">
            <div class="Logincontainer" id="face1">
                <button class="buttonclose">
                    <span class="X"></span>
                    <span class="Y"></span>
                    <div class="close">Close</div>
                </button>
                <button class="animated-button-login" id="face1btn">
                    <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                        </path>
                    </svg>
                    <span class="text">Login </span>
                    <span class="circle"></span>
                    <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                        </path>
                    </svg>
                </button>
                <div class="heading">Sign In</div>
                <form method="post" class="formLogin">
                    <div>
                        <h4 class="text-danger">
                            <?php echo $errmsg ?>
                        </h4>
                    </div>
                    <div>
                        <h5 class="text-green">
                            <?php echo $sucmsg ?>
                        </h5>
                    </div>
                    <input required="" class="inputLoginMain" type="text" name="sifname" id="email" placeholder="First Name">
                    <input required="" class="inputLoginMain" type="text" name="silname" id="email" placeholder="Last Name">
                    <input required="" class="inputLoginMain" type="email" name="siemail" id="email" placeholder="E-mail">
                    <input required="" class="inputLoginMain" type="password" name="sipassword" id="password"
                        placeholder="Password">
                    <input class="login-button" type="submit" name="signUp">
                </form>
                <div class="social-account-container">
                    <span class="title">Or Sign in with</span>
                    <div class="social-accounts">
                        <button class="social-button google">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                                <path
                                    d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                </path>
                            </svg></button>
                        <button class="social-button apple">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                <path
                                    d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z">
                                </path>
                            </svg>
                        </button>
                        <button class="social-button twitter">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <span class="agreement"><a href="#">By signing up , you accept the terms and conditions</a></span>
            </div>
            <div class="Logincontainer" id="face2">
                <button class="buttonclose buttonclose2">
                    <span class="X"></span>
                    <span class="Y"></span>
                    <div class="close">Close</div>
                </button>
                <button class="animated-button-login " id="face2btn">
                    <svg viewBox="0 0 24 24" class="arr-2 arr-22" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                        </path>
                    </svg>
                    <span class="text">Sign in </span>
                    <span class="circle"></span>
                    <svg viewBox="0 0 24 24" class="arr-1 arr-11" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                        </path>
                    </svg>
                </button>
                <div class="heading">Login</div>
                <form method="post" class="formLogin">
                    <input required="" class="inputLoginMain" type="email" name="liemail" id="email" placeholder="E-mail">
                    <input required="" class="inputLoginMain" type="password" name="lipass" id="password"
                        placeholder="Password">
                    <input class="login-button" name="logIn" type="submit">

                </form>
                <div class="social-account-container">
                    <span class="title">Or Login with</span>
                    <div class="social-accounts">
                        <button class="social-button google">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                                <path
                                    d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                </path>
                            </svg></button>
                        <button class="social-button apple">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                <path
                                    d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z">
                                </path>
                            </svg>
                        </button>
                        <button class="social-button twitter">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <span class="agreement"><a href="#">By signing up , you accept the terms and conditions</a></span>
            </div>
</div>