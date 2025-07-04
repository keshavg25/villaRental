<?php
error_reporting(0);
    include_once "connection.php";
    if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }

    $nid=$_GET['nid'];

    if($nid==""){
    if(isset($_POST['add'])){
        $nquestion=$_POST['faqQuestion'];
        $nanswer=$_POST['faqAnswer'];
        $nstatus=$_POST['status'];

        $ins="INSERT INTO faq SET
                    faq_question='$nquestion',
                    faq_answer='$nanswer',
                    faq_status='$nstatus'";
        
        mysqli_query($con,$ins);            
    }
    }   
    else{
        $sel="SELECT * FROM faq where faq_id = '$nid' ";
        $exe=mysqli_query($con,$sel);
        $fetch=mysqli_fetch_array($exe);

        if(isset($_POST['add'])){
            $nquestion=$_POST['faqQuestion'];
            $nanswer=$_POST['faqAnswer'];
            $nstatus=$_POST['status'];

            $upd="UPDATE faq SET
                        faq_question='$nquestion',
                        faq_answer='$nanswer',
                        faq_status='$nstatus' Where faq_id = '$nid' ";
            
            
            mysqli_query($con,$upd);
            header("Location:viewfaq.php");
        }

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
                <h2>Add a new FAQ</h2>
                <div class="contact-box">
                    <form action="" class="wdi" method="post" enctype="multipart/form-data">
                    <h5>FAQ Question : </h5>
                    <input type="text" name="faqQuestion" value="<?php echo $fetch['faq_question']?>" class="addc-inp">
                    <h5>FAQ Answer : </h5>
                    <input type="text" name="faqAnswer" value="<?php echo $fetch['faq_answer']?>" class="addc-inp">
                    <div class="wdi">
                    <input type="radio" name="status" value="1" <?php if($fetch['faq_status']==1) echo 'checked' ?>>&nbsp; Active &nbsp;&nbsp;
                    <input type="radio" name="status" value="0" <?php if($fetch['faq_status']==0 && $fetch['faq_status']!="") echo 'checked' ?>>&nbsp; Deactive
                    </div>
                    <?php 
                        if($nid!=""){
                            ?> 
                            <input class="cu-btn" type="submit" name="add" value="Update">
                            <?php
                        }
                        else{
                            ?>
                            <input class="cu-btn" type="submit" name="add" value="Add">
                            <?php
                        }

                    ?>
                    </form>
                </div>
            </div>    
        </div>
    </aside>
</body>

</html>