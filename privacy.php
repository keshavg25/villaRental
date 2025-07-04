<?php
    include_once "connection.php";

    session_start();
    
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
                    <h1>PRIVACY POLICY</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="privacy">
                <p>This privacy notice discloses the privacy practices for TheEscapeBay.com. This privacy notice applies solely to information collected by this website. It will notify you of the following</p>
                <ul>
                    <li>What personally identifiable information is collected from you through the website, how it is used, and with whom it may be shared.</li>
                    <li>What choices are available to you regarding the use of your data.</li>
                    <li>The security procedures in place to protect the misuse of your information.</li>
                    <li>How you can correct any inaccuracies in the information</li>
                </ul>
                <h3>INFORMATION COLLECTION, USE, AND SHARING</h3><br>
                <p>We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone. We will use your information to respond to you regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request (e.g., to answer a question, or for marketing). Unless you request otherwise, we may contact you via email in the future to tell you about special offers, new offerings, or changes to this privacy policy.</p><br>
                <h3>YOUR ACCESS TO AND CONTROL OVER INFORMATION</h3><br>
                <p>You may opt-out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address shown on our website, including:</p>
                <ul>
                    <li>See what data we have about you, if any,</li>
                    <li>Change/correct any data we have about you,</li>
                    <li>Have us delete any data we have about you, or</li>
                    <li>Express any concern you have about our use of your data.</li>
                </ul>
                <h3>SECURITY</h3><br>
                <p>We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline. Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for “https” at the beginning of the address of the Web page. While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment. If you feel that we are not abiding by this privacy policy, you should contact us immediately.</p><br>
                <h3>LINKS</h3><br>
                <p>This website may contain links to other sites. Please be aware that we are not responsible for the content or privacy practices of such other sites. We encourage our users to be aware when they leave our site and to read the privacy statements of any other site that collects personally identifiable information. </p><br>
                <h3>REGISTRATION</h3><br>
                <p>In order to use portions of this website, a user may need to complete a registration form. During registration, a user is required to give certain information (such as name and email address). This information is used to contact you about the offerings on our site in which you have expressed interest. At your option, you may also provide more detailed information about yourself and your preferences, but it is not required. You can choose to opt out at any time. </p><br>
                <h3>BOOKINGS</h3><br>
                <p>We request information from you on our booking form. To complete your booking with us, you must provide contact information (e.g., name, phone number, address) and financial information (e.g., credit card number, expiration date). This information is used for billing purposes and to complete your booking. If we have trouble processing a booking, we’ll use this information to contact you. We use a credit card processing company to bill users for use of our property and services. These companies do not retain, share, store or use personally identifiable information for any secondary purposes beyond filling your order. </p><br>
                <h3>COOKIES</h3><br>
                <p>We use “cookies” on this site. A cookie is a piece of data stored on a site visitor’s hard drive to help us improve your access to our site and identify repeat visitors to our site. For instance, when we use a cookie to identify you, you would not have to log in a password more than once, thereby saving time while on our site. Cookies can also enable us to track and target the interests of our users to enhance the experience on our site. Usage of a cookie is in no way linked to any personally identifiable information on our site. You may refuse the use of cookies by selecting the appropriate settings on your browser, however if you do this, you may not be able to use the full functionality of this website.</p><br>
                <p>Our website uses Google Analytics and/or similar services, which transmit website traffic data to analytics company servers in the United States. Google Analytics and similar services do not identify individual users or associate your IP address with any other data held by Google. We use reports provided by Google Analytics and similar service companies to help us understand website traffic and web page usage.</p><br>
                <h3>SURVEYS AND CONTESTS</h3><br>
                <p>From time to time, our site requests information via surveys or contests. Participation in these surveys or contests is completely voluntary and you may choose whether or not to participate and therefore disclose this information. Information requested may include contact information (e.g., name and address), and demographic information (e.g., zip code, age range). Contact information will be used to notify the winners and award prizes. Survey information will be used for purposes of monitoring or improving the use and satisfaction of this site.</p><br>
            </div>
        </div>
        <?php
            include_once "footer.php";
        ?>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>