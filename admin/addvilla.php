<?php
error_reporting(0);
    include_once "connection.php";
    if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }

    $nid=$_GET['nid'];

    if($nid==""){
    if(isset($_POST['add'])){
        $nname=$_POST['cname'];
        $nprice=$_POST['cprice'];
        $ndiscount=$_POST['cdiscount'];
        $nstatus=$_POST['status'];

        $image=$_FILES['cimage'];
        $imgname=$image['name'];
        $tmp=$image['tmp_name'];
        $path="../gallery-Store/".$imgname;
        move_uploaded_file($tmp,$path);

        $image1=$_FILES['cimage1'];
        $imgname1=$image1['name'];
        $tmp1=$image1['tmp_name'];
        $path1="../gallery-Store/".$imgname1;
        move_uploaded_file($tmp1,$path1);

        $image2=$_FILES['cimage2'];
        $imgname2=$image2['name'];
        $tmp2=$image2['tmp_name'];
        $path2="../gallery-Store/".$imgname2;
        move_uploaded_file($tmp2,$path2);
        
        $image3=$_FILES['cimage3'];
        $imgname3=$image3['name'];
        $tmp3=$image3['tmp_name'];
        $path3="../gallery-Store/".$imgname3;
        move_uploaded_file($tmp3,$path3);

        $ins="INSERT INTO villa SET
                villa_name='$nname',
                villa_price='$nprice',
                villa_discount='$ndiscount',
                villa_status='$nstatus',
                villa_imagem='$imgname',
                villa_image1='$imgname1',
                villa_image2='$imgname2',
                villa_image3='$imgname3'";
        
        mysqli_query($con,$ins);
    }
    }

    else{
        $sel="SELECT * FROM villa where villa_id = '$nid' ";
        $exe=mysqli_query($con,$sel);
        $fetch=mysqli_fetch_array($exe);

        if(isset($_POST['add'])){
            $nname=$_POST['cname'];
            $nprice=$_POST['cprice'];
            $ndiscount=$_POST['cdiscount'];
            $nstatus=$_POST['status'];
            $image=$_FILES['cimage'];
            $imgname=$image['name'];
            $image1=$_FILES['cimage1'];
            $imgname1=$image1['name'];
            $image2=$_FILES['cimage2'];
            $imgname2=$image2['name'];
            $image3=$_FILES['cimage3'];
            $imgname3=$image3['name'];
            if($imgname != "" || $imgname1 != "" || $imgname2 != "" || $imgname3 != ""){

            $tmp=$image['tmp_name'];
            $path="../gallery-Store/".$imgname;
            move_uploaded_file($tmp,$path);
            $tmp1=$image1['tmp_name'];
            $path1="../gallery-Store/".$imgname1;
            move_uploaded_file($tmp1,$path1);
            $tmp2=$image2['tmp_name'];
            $path2="../gallery-Store/".$imgname2;
            move_uploaded_file($tmp2,$path2);
            $tmp3=$image3['tmp_name'];
            $path3="../gallery-Store/".$imgname3;
            move_uploaded_file($tmp3,$path3);


            $upd="UPDATE villa SET
                    villa_name='$nname',
                    villa_price='$nprice',
                    villa_discount='$ndiscount',
                    villa_status='$nstatus',
                    villa_imagem='$imgname',
                    villa_image1='$imgname1',
                    villa_image2='$imgname2',
                    villa_image3='$imgname3' where villa_id = '$nid' ";
            mysqli_query($con,$upd);        

            }
            else{
                $upd="UPDATE villa SET
                    villa_name='$nname',
                    villa_price='$nprice',
                    villa_discount='$ndiscount',
                    villa_status='$nstatus' where villa_id = '$nid' ";
            mysqli_query($con,$upd);         
        }

            header("Location:viewvilla.php");
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
                <h2>ADD Villa's :</h2>
                <div class="contact-box">
                    <form action="" class="contact-box" method="post" enctype="multipart/form-data">
                    <h5>Villa Name : </h5>
                    <input type="text" name="cname" value="<?php echo $fetch['villa_name'] ?>" class="addc-inp">
                    <div class="cu-box">
                        <h5>Price : </h5>
                        <input class="cu-inp" name="cprice" value="<?php echo $fetch['villa_price']?>" type="text">
                    </div>    
                    <div class="cu-box">
                        <h5>Discount : </h5>
                        <input class="cu-inp" name="cdiscount" value="<?php echo $fetch['villa_discount']?>" type="text">
                    </div>
                    <?php
                    include_once "textedi.php";
                    ?>
                    <h5 class="mgb-10 mgt-10">Villa Main Image : </h5>
                    <div class="mb-3 wdi">
                        <div class="wdi">
                            <input class="form-control form-control-sm wdi" name="cimage" value="" id="formFileSm" type="file">
                        </div>
                        <?php
                            if($nid!=""){
                                ?>
                                <div class="img-box">
                                    <img src="../gallery-Store/<?php echo $fetch['villa_imagem'] ?>"width="100%" height="150px" >
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <h5 class="mgb-10 mgt-10">Villa Image's : </h5>
                    <div class="mb-3 wdi">
                        <div class="wdi">
                            <input class="form-control form-control-sm wdi" name="cimage1" value="" id="formFileSm" type="file">
                            <input class="form-control form-control-sm wdi" name="cimage2" value="" id="formFileSm" type="file">
                            <input class="form-control form-control-sm wdi" name="cimage3" value="" id="formFileSm" type="file">
                        </div>
                        <?php
                            if($nid!=""){
                                ?>
                                <div class="img-box">
                                    <img src="../gallery-Store/<?php echo $fetch['villa_image1'] ?>"width="100%" height="150px" >
                                </div>
                                <div class="img-box">
                                    <img src="../gallery-Store/<?php echo $fetch['villa_image2'] ?>"width="100%" height="150px" >
                                </div>
                                <div class="img-box">
                                    <img src="../gallery-Store/<?php echo $fetch['villa_image3'] ?>"width="100%" height="150px" >
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div>
                        <input type="radio" name="status" value="1" <?php if($fetch['villa_status']==1)  echo 'checked' ?> >&nbsp; Active &nbsp;&nbsp;
                        <input type="radio" name="status" value="0" <?php if($fetch['villa_status']==0 && $fetch['villa_status']!="")  echo 'checked' ?> >&nbsp; Deactive   </br> </br>                
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
                    </div>
                </div>
                </form>
            </div>    
        </div>
    </aside>
</body>

</html>