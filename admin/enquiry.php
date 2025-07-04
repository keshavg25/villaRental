<?php
error_reporting(0);
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
                <h2>Enquiries:</h2>
                <div class="cp-box">
                <div class="table-responsive">
                    <table class="table wdi">
                        <thead>
                            <tr>
                            <th scope="col">Sr.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">ContactNo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Enquiry</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $limit=3;

                                $page=$_GET['page'];

                                if($page!=""){
                                    $page=$_GET['page'];
                                }
                                else{
                                    $page=1;
                                }

                                $offset=($page-1)*$limit;

                                $sel="SELECT * FROM enquiry limit $offset,$limit";
                                $exe=mysqli_query($con,$sel);
                                while($fetch=mysqli_fetch_array($exe)){
                                    // echo "<pre>";
                                    // print_r($fetch);

                            ?>
                            <tr>
                            <th scope="row"><?php echo $fetch['e_id'] ?></th>
                            <td><?php echo $fetch['e_name'] ?></td>
                            <td><?php echo $fetch['e_phone'] ?></td>
                            <td><?php echo $fetch['e_email'] ?></td>
                            <td><?php echo $fetch['e_message'] ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                     </table>
                </div>
                <nav aria-label="...">
                    <?php

                    $selll="SELECT * FROM enquiry";
                    $exe=mysqli_query($con,$selll);
                    $totrow=mysqli_num_rows($exe);

                    if($totrow>0){
                        $totpages=ceil($totrow/$limit);
                    }

                    echo '<ul class="pagination pagination-sm pagina">';
                    if($page>1){
                        echo '<li class="page-item"><a class="page-link" href="enquiry.php?page='.($page-1).'">Pre</a></li>';
                    }
                    for($i=1;$i<=$totpages;$i++){
                        echo '<li class="page-item"><a class="page-link" href="enquiry.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($page<$totpages){
                        echo '<li class="page-item"><a class="page-link" href="enquiry.php?page='.($page+1).'">Next</a></li>';
                    }
                    echo '</ul>';
                    ?>
                    <!-- <ul class="pagination pagination-sm pagina">
                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                        <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul> -->
                </nav>
                </div>
            </div>
        </div>
    </aside>
</body>
</html>