<?php
error_reporting(0);
    include_once "connection.php";

    if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }
    $did=$_GET['did'];

    if($did!=""){
        $del="DELETE FROM gallery WHERE gallery_id = '$did'";
        mysqli_query($con,$del);
    }

    if(isset($_POST['delete'])){
        $arr=$_POST['chk'];
        $ides=implode(",",$arr);
        $del="DELETE FROM gallery WHERE gallery_id in($ides)";
        mysqli_query($con,$del);
    }

    $sid=$_GET['sid'];
    $stid=$_GET['std'];

    if($sid!="" && $stid!=""){
        $updsts="UPDATE gallery SET
                    gallery_status = '$stid' where gallery_id = '$sid' ";

        mysqli_query($con,$updsts);            
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
                <h2>View Gallery :</h2>
                <div class="cp-box">
                <div class="table-responsive">
                    <form method="post">
                    <table class="table wdi">
                        <thead>
                            <tr>
                            <th scope="col"><input type="submit" name="delete" value="Delete"></th>
                            <th scope="col">Sr.No</th>
                            <th scope="col">Image Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once "connection.php";

                                $limit=3;
                                
                                $page=$_GET['page'];

                                if($page!=""){
                                    $page=$_GET['page'];                                  
                                }
                                else{
                                    $page=1;
                                }

                                $offset=($page-1)*$limit;

                                $sel="SELECT * FROM gallery limit $offset,$limit";
                                $exe=mysqli_query($con,$sel);
                                
                                while($fetch=mysqli_fetch_array($exe)){


                            ?>
                            <tr>
                            <td><input type="checkbox" name="chk[]" value="<?php echo $fetch['gallery_id']?>"></td>
                            <td><?php echo $fetch['gallery_id']?></td>
                            <td><?php echo $fetch['gallery_title']?></td>
                            <td><img src="../gallery-Store/<?php echo $fetch['gallery_image'] ?>" alt="" width="50" height="60"></td>
                            <td>
                                <?php
                                    if($fetch['gallery_status']==1){
                                        ?>
                                        <a href="viewgallery.php?sid=<?php echo $fetch['gallery_id']?>&std=0" class="std">
                                        <input type="button" value="Active" class="status-abtn">
                                        </a>
                                <?php
                                    }
                                    else{
                                        ?>
                                        <a href="viewgallery.php?sid=<?php echo $fetch['gallery_id']?>&std=1" class="std">
                                        <input type="button" value="Deactive" class="status-dbtn">
                                        </a>
                                <?php    
                                }
                                ?>
                            </td>
                            <td>
                                <a href="viewgallery.php?did=<?php echo $fetch['gallery_id']?>">
                                <input class="wdi" type="button" value="Delete">
                                </a>
                                <a href="addgallery.php?nid=<?php echo $fetch['gallery_id']?>">
                                <input class="wdi" type="button" value="Edit">
                                </a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                     </table>
                     </form>
                </div>
               
                <nav aria-label="...">
                    <?php

                    $selpag="SELECT * FROM gallery";
                    $exe=mysqli_query($con,$selpag);
                    $totrows=mysqli_num_rows($exe);

                    if($totrows>0){
                        $totpage=ceil($totrows/$limit);
                    }
                
                    echo '<ul class="pagination pagination-sm pagina">';
                    if($page>1){
                        echo '<li class="page-item"><a class="page-link" href="viewgallery.php?page='.($page-1).'">Pre</a></li>';    
                    }
                    for($i=1;$i<=$totpage;$i++){
                        echo '<li class="page-item"><a class="page-link" href="viewgallery.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($page<$totpage){
                        echo '<li class="page-item"><a class="page-link" href="viewgallery.php?page='.($page+1).'">Next</a></li>';    
                    }
                    echo '</ul>'
                    
                    ?>
                    <!-- <ul class="pagination pagination-sm pagina">
                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                        <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul> -->
                </nav>
</div>
            </div>

        </div>
    </aside>
</body>
<!-- <link rel="stylesheet" href="3.css"> -->
</html>