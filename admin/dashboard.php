<?php

    include_once "connection.php";
    
    
    
    if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }

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
                <h1>Welcome To EscapeBay Dashboard</h1>
                <div class="dash">
                    <div class="dash-items">
                        <?php
                        
                            $sel="SELECT * FROM reg";
                            $exe=mysqli_query($con,$sel);
                            $fetch=mysqli_num_rows($exe);
                        
                        ?>
                        <h4>Registered Users : <?php echo $fetch ?></h4>
                    </div>
                    <div class="dash-items">
                    <?php
                        
                        $sel1="SELECT * FROM enquiry";
                        $exe1=mysqli_query($con,$sel1);
                        $fetch1=mysqli_num_rows($exe1);
                    
                    ?>
                        <h4>Total Enquiries : <?php echo $fetch1 ?></h4>
                    </div>
                    <div class="dash-items">
                    <?php
                        
                        $sel2="SELECT * FROM villa";
                        $exe2=mysqli_query($con,$sel2);
                        $fetch2=mysqli_num_rows($exe2);
                    
                    ?>
                        <h4>Total Villa's : <?php echo $fetch2 ?></h4>
                    </div>
                    <div class="dash-items">
                    <?php
                        
                        $sel3="SELECT * FROM booking";
                        $exe3=mysqli_query($con,$sel3);
                        $fetch3=mysqli_num_rows($exe3);
                    
                    ?>
                        <h4>Total Booking's : <?php echo $fetch3 ?></h4>
                    </div>
                    <div class="dash-items">
                    <?php
                        
                        $sel5="SELECT * FROM review";
                        $exe5=mysqli_query($con,$sel5);
                        $fetch5=mysqli_num_rows($exe5);
                    
                    ?>
                        <h4>Total Review's : <?php echo $fetch5 ?></h4>
                    </div>
                    <div class="dash-items">
                    <?php
                        
                        $sel4="SELECT * FROM gallery";
                        $exe4=mysqli_query($con,$sel4);
                        $fetch4=mysqli_num_rows($exe4);
                    
                    ?>
                        <h4>Total Gallery Picture's : <?php echo $fetch4 ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</body>
</html>