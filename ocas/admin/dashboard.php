<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>OCAS Admin : Dashboard</title>
    <link href="../assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="../assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-bag f-s-22 color-primary border-primary round-widget"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <?php 
                        
$sql1 ="SELECT * from  tblcourse";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totcourse=$query1->rowCount();
?>
                                        <h4 style="color: blue">Total Course</h4>
                                        <h4 style="color: blue"><?php echo htmlentities($totcourse);?></h4>
                                        <a href="course.php"><h5>View Detail</h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-bar-chart f-s-22 color-warning border-warning round-widget"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <?php 
                        
$sql2 ="SELECT * from  tblsubject";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totsub=$query2->rowCount();
?>
                                        <h4 style="color: blue">Total Subject</h4>
                                         <h4 style="color: blue"><?php echo htmlentities($totsub);?></h4>
                                         <a href="subject.php"><h5>View Detail</h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-comment f-s-22 color-success border-success round-widget"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <?php 
                        
$sql3 ="SELECT * from  tblteacher";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$totteacher=$query3->rowCount();
?>
                                       <h4 style="color: blue">Total Teacher</h4>
                                         <h4 style="color: blue"><?php echo htmlentities($totteacher);?></h4>
                                         <a href="manage-teacher.php"><h5>View Detail</h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                  
                  
                   <?php include_once('includes/footer.php');?>
                </div>
            </div>
        </div>
    </div>


    <!-- jquery vendor -->
    <script src="../assets/js/lib/jquery.min.js"></script>
    <!-- nano scroller -->
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/lib/menubar/sidebar.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- Circle Progress Bar -->
    <script src="../assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="../assets/js/lib/chartist/chartist.min.js"></script>
    <script src="../assets/js/lib/chartist/chartist-init.js"></script>
    <script src="../assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="../assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <!-- Bar Chat Js -->
    <script src="../assets/js/lib/peitychart/jquery.peity.min.js"></script><!-- scripit init-->
    <script src="../assets/js/lib/peitychart/peitychart.init.js"></script><!-- scripit init-->


    <script src="../assets/js/lib/datamap/d3.min.js"></script>
    <script src="../assets/js/lib/datamap/topojson.js"></script>
    <script src="../assets/js/lib/datamap/datamaps.world.min.js"></script>
    <script src="../assets/js/lib/datamap/datamap-init.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../assets/js/lib/owl-carousel/owl.carousel-init.js"></script>

    <script src="../assets/js/lib/morris-chart/raphael-min.js"></script>
    <script src="../assets/js/lib/morris-chart/morris.js"></script>
    <script src="../assets/js/lib/morris-chart/morris-init.js"></script>

    <script src="../assets/js/scripts.js"></script>

</body>

</html><?php }  ?>