<?php
error_reporting(0);
    include_once "connection.php";
    if($_SESSION['ADMIN']==""){
        header("Location:index.php");
    }

    $did=$_GET['did'];

    if($did!=""){
        $del="DELETE FROM villa WHERE villa_id = '$did'";
        mysqli_query($con,$del);
    }

    if(isset($_POST['delete'])){
        $arr=$_POST['chk'];
        $ides=implode(",",$arr);
        $del="DELETE FROM villa WHERE villa_id in($ides)";
        mysqli_query($con,$del);
    }
    
    if(isset($_POST['ordersearch'])){
        $cufield=$_POST['field'];
        $cuorder=$_POST['order'];

        if($cufield!="" && $cuorder!=""){
            $order="ORDER BY $cufield $cuorder";
        }
    }

    $sid=$_GET['sid'];
    $std=$_GET['std'];

    if($sid!="" && $std!=""){
        $updstd="UPDATE villa SET
                    villa_status = '$std' where villa_id = '$sid' ";

        mysqli_query($con,$updstd);            
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
                <h2>View Villa</h2>
                <div class="cp-box">
                <div class="table-responsive">
                <form method="post">
                <?php
                    // $selcnt="SELECT COUNT(*) FROM courses";
                    // $exe=mysqli_query($con,$selcnt);
                    // // echo "<pre>";
                    // $fetchcnt=mysqli_fetch_array($exe);

                    // $selact="SELECT COUNT(*) FROM courses where courses_status = '1'";
                    // $exe=mysqli_query($con,$selact);
                    // // echo "<pre>";
                    // $fetchact=mysqli_fetch_array($exe);

                    // $seldact="SELECT COUNT(*) FROM courses where courses_status = '0'";
                    // $exe=mysqli_query($con,$seldact);
                    // // echo "<pre>";
                    // $fetchdact=mysqli_fetch_array($exe);

                    // $selsum="SELECT SUM(courses_price) as cn FROM COURSES";
                    // $exe=mysqli_query($con,$selsum);
                    // $fetchsum=mysqli_fetch_array($exe);

                    // $selavg="SELECT AVG(courses_price) FROM courses";
                    // $exe=mysqli_query($con,$selavg);
                    // $fetchavg=mysqli_fetch_array($exe);

                    // $selmin="SELECT MIN(courses_price) FROM courses";
                    // $exe=mysqli_query($con,$selmin);
                    // $fetchmin=mysqli_fetch_array($exe);

                    // $selmax="SELECT MAX(courses_price) FROM courses";
                    // $exe=mysqli_query($con,$selmax);
                    // $fetchmax=mysqli_fetch_array($exe);
                // ?>
                <!-- <div>
                    <form action="" method="post">
                        <select name="field" id="">
                            <option value="">Select</option>
                            <option value="courses_name">course name</option>
                            <option value="courses_price">course price</option>
                            <option value="courses_des">course des</option>
                        </select>
                        <select name="order" id="">
                            <option value="">select</option>
                            <option value="ASC">ASC</option>
                            <option value="DESC">DESC</option>
                        </select>
                        <input class="vn-btn" type="submit" name="ordersearch" value="GET">
                    </form>
                </div>
                <div>
                    <?php

                        $selgp="SELECT villa_name,count(villa_name) FROM villa GROUP BY villa_name";
                        $exegp=mysqli_query($con,$selgp);
                        while($fetchgrp=mysqli_fetch_assoc($exegp)){
                            ?>
                            <div align="center">
                                <?php echo $fetchgrp['villa_name'] ?> :- <?php echo $fetchgrp['count(villa_name)'] ?>
                            </div>
                            <?php 
                        }

                    ?>
                </div> -->
                <table class="table wdi">
                        <thead>
                            <tr>
                            <th scope="col"><input type="submit" name="delete" value="Delete"></th>
                            <th scope="col">Villa ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">ImageM</th>
                            <th scope="col">Image1</th>
                            <th scope="col">Image2</th>
                            <th scope="col">Image3</th>
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
                            

                            $sel="SELECT * FROM villa where 1=1 $where $order limit $offset,$limit";
                            $exe=mysqli_query($con,$sel);

                            while($fetch=mysqli_fetch_array($exe)){
                                
                        ?>
                            <tr>
                            <td><input type="checkbox" name="chk[]" value="<?php echo $fetch['villa_id']?>"></td>
                            <td><?php echo $fetch['villa_id'] ?></td>
                            <td><?php echo $fetch['villa_name'] ?></td>
                            <td><?php echo $fetch['villa_price'] ?></td>
                            <td><?php echo $fetch['villa_discount']?></td>
                            <td><img src="../gallery-Store/<?php echo $fetch['villa_imagem']?>" alt="" width="60" height="60"></td>
                            <td><img src="../gallery-Store/<?php echo $fetch['villa_image1']?>" alt="" width="60" height="60"></td>
                            <td><img src="../gallery-Store/<?php echo $fetch['villa_image2']?>" alt="" width="60" height="60"></td>
                            <td><img src="../gallery-Store/<?php echo $fetch['villa_image3']?>" alt="" width="60" height="60"></td>
                            <td>
                                <?php 
                                    if($fetch['villa_status']==1){
                                        ?>
                                        <a href="viewvilla.php?sid=<?php echo $fetch['villa_id']?>&std=0" class="std">
                                        <input type="button" value="Active" class="status-abtn" >
                                        </a>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <a href="viewvilla.php?sid=<?php echo $fetch['villa_id']?>&std=1" class="std">
                                        <input type="button" value="Deactive" class="status-dbtn">
                                        </a>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="viewvilla.php?did=<?php echo $fetch['villa_id']?>">
                                <input type="button" class="wdi" value="Delete"><br>
                                </a>
                                <a href="addvilla.php?nid=<?php echo $fetch['villa_id']?>">
                                <input type="button" class="wdi" value="Edit">
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

                        $selll="SELECT * FROM villa";
                        $exe=mysqli_query($con,$selll);
                        $totrow=mysqli_num_rows($exe);

                        if($totrow>0){
                            $totpages=ceil($totrow/$limit);
                        }
                        
                        echo '<ul class="pagination pagination-sm pagina">';
                        if($page > 1){
                            echo '<li class="page-item"><a class="page-link" href="viewvilla.php?page='.($page-1).'">Pre</a></li>';
                        }
                        for($i=1;$i<=$totpages;$i++){
                            echo '<li class="page-item"><a class="page-link" href="viewvilla.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        if($page < $totpages){
                            echo '<li class="page-item"><a class="page-link" href="viewvilla.php?page='.($page+1).'">Next</a></li>';
                        }
                        echo '</ul>';

                    ?>
                    <!-- <ul class="pagination pagination-sm pagina">
                        <li class="page-item"><a class="page-link" href="#">Pre</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
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
<style>
    .cu-inp{
        width: 40%;
        height: 30px;
        margin-right: 40px;
        margin-bottom: 10px;
        margin-top: 10px;
    }    
</style>
</html>