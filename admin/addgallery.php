<?php
error_reporting(0);
    include_once "connection.php";
    if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }

    $nid=$_GET['nid'];

    if($nid==""){
    if(isset($_POST['add'])){
        $ntitle=$_POST['galltitle'];
        $nstatus=$_POST['status'];
        $image=$_FILES['gallimg'];
        $imgname=$image['name'];
        $tmp=$image['tmp_name'];
        $path="../gallery-Store/".$imgname;
        move_uploaded_file($tmp,$path); 

        $ins="INSERT INTO gallery SET
                    gallery_title='$ntitle',
                    gallery_status='$nstatus',
                    gallery_image='$imgname'";
        
        mysqli_query($con,$ins);            
    }
    }   
    else{
        $sel="SELECT * FROM gallery where gallery_id = '$nid' ";
        $exe=mysqli_query($con,$sel);
        $fetch=mysqli_fetch_array($exe);

        if(isset($_POST['add'])){
            $ntitle=$_POST['galltitle'];
            $nstatus=$_POST['status'];
            $image=$_FILES['gallimg'];
            $imgname=$image['name'];
            if($imgname!=""){
                $upd="UPDATE gallery SET
                    gallery_title='$ntitle',
                    gallery_status='$nstatus',
                    gallery_image='$imgname' where gallery_id = '$nid' ";
            }
            else{
                $tmp=$image['tmp_name'];
                $path="../gallery-Store/".$imgname;
                move_uploaded_file($tmp,$path);
                $upd="UPDATE gallery SET
                    gallery_title='$ntitle',
                    gallery_status='$nstatus' where gallery_id = '$nid' ";       
            }
            
            
            mysqli_query($con,$upd);
            header("Location:viewgallery.php");
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
                <h2>Add Gallery Image</h2>
                <div class="contact-box">
                    <form action="" class="wdi" method="post" enctype="multipart/form-data">
                    <h5>Image Title : </h5>
                    <input type="text" name="galltitle" value="<?php echo $fetch['gallery_title']?>" class="addc-inp">
                    <h5 class="mgb-10">Choose an Image : </h5>
                    <div class="mb-3 wdi">
                        <div class="wdi">
                            <input class="form-control form-control-sm wdi" name="gallimg" value="" id="formFileSm" type="file">    
                        </div>
                        <?php
                            if($nid!=""){
                                ?>
                                <div class="img-box">
                                    <img src="../gallery-Store/<?php echo $fetch['gallery_image'] ?>"width="100%" height="200px" >
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="wdi">
                    <input type="radio" name="status" value="1" <?php if($fetch['gallery_status']==1) echo 'checked' ?>>&nbsp; Active &nbsp;&nbsp;
                    <input type="radio" name="status" value="0" <?php if($fetch['gallery_status']==0 && $fetch['gallery_status']!="") echo 'checked' ?>>&nbsp; Deactive
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