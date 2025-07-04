<?php

session_start();

unset($_SESSION['loginID']);
unset($_SESSION['loginEmail']);

header("Location:index.php");
?>