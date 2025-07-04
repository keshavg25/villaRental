<?php

if($_SESSION['ADMIN']==""){
    header("Location:index.php");
}

$currentPage = basename($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="white-box"></div>
    <nav class="navbar">
                <div class="logo navelems">
                    <img class="logoimg" src="images/logo6.PNG" alt="">
                </div>
                <div class="hamburger" onclick="toggleMenu()">☰</div> <!-- Hamburger Icon -->
                <ul class="navul" id="navMenu">
                    <li class="navelems"><a href="admin.php" class="cinzel <?= ($currentPage == 'index.php') ? 'active' : '' ?>">Profile</a></li>
                    <li class="navelems"><a href="dashboard.php" class="cinzel <?= ($currentPage == 'index.php') ? 'active' : '' ?>">Dashboard</a></li>
                    <li class="navelems"><a href="cp.php" class="cinzel <?= ($currentPage == 'index.php') ? 'active' : '' ?>">Change Password</a></li>
                    <li class="navelems"><a href="logout.php" class="cinzel <?= ($currentPage == 'index.php') ? 'active' : '' ?>">Logout</a></li>
                    <li class="navelems"><a href="http://localhost/villarental/" class="cinzel <?= ($currentPage == 'index.php') ? 'active' : '' ?>">Go to Website</a></li>
                </ul>
</nav>
</body>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
}

html {
    scroll-behavior: smooth;
}
.blanknav{
width: 100%;
height: 12vh;
z-index: -999;
}

.navbar {
position: fixed;
top: 0px;
height: 12vh;
/* border-radius: 1vw; */
width: 100%;
box-shadow: 0px 2px 10px 0px grey;
display: flex;
align-items: center;
justify-content: space-between;
background: #FFFFFF;
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
z-index: 2;
padding: 1vw 2vw;
font-style: italic;
/* overflow: hidden; */
}

.navbar a.nav-link {
    color: #948058;
    text-decoration: none;
    padding: 0.5vw 1vw;
    margin: 0 0.5vw;
    transition: all 0.3s ease;
    border-radius: 0.5vw;
    font-weight: 500;
    font-size: 1.1vw;
}

.navbar a.nav-link:hover {
    background-color: rgba(148, 128, 88, 0.1);
}

.navbar a.nav-link.active {
    background-color: #948058;
    color: #fff;
    box-shadow: 0 4px 12px rgba(148, 128, 88, 0.4);
    transform: scale(1.05);
}


.bottomline {
position: absolute;
bottom: 0;
left: 0;
width: 100%;
height: 0.3vh;
background: #727272;
}

.logo {
height: 100%;
background-position: center;
background-color: #948058a1;
}

.logoimg {
height: 120%;
width: 120%;
object-fit: cover;
scale: 1.5;
margin-left: 10px;
overflow: hidden;
}

.navul {
position: relative;
display: flex;
list-style: none;
align-items: center;
justify-content: space-between;
gap: 8vw;
margin-top: 2vh;
}

.navul li a {
position: relative;
font-size: 400;
color: #2f2f2fb0;
text-decoration: none;
font-style: italic;

}

.navul li:first-child a{
color: #948058;
}

.navul li a::before {
content: '';
position: absolute;
top: 100%;
left: 0;
width: 0;
height: 2px;
background: #1f1f1f;
transition: width 0.3s;
}

.navul li a:hover::before {
width: 100%;
}
.hamburger {
    display: none;
    font-size: 2rem;
    cursor: pointer;
    color: #948058;oca
    z-index: 5;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .hamburger {
        display: block;
    }

    .navul {
        position: absolute;
        top: 12vh;
        left: 0;
        right: 0;
        background: #ffffff;
        flex-direction: column;
        gap: 5vh;
        align-items: center;
        padding: 2vh 0;
        display: none;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        transition: 2s;
    }

    .navul.active {
        display: flex;
    }

    .navul li a {
        font-size: 4vw;
    }

    .logoimg {
        height: 80%;
        width: auto;
        scale: 1;
    }
}
</style>
<script>
    function toggleMenu() {
        document.getElementById("navMenu").classList.toggle("active");
    }
</script>
</html>