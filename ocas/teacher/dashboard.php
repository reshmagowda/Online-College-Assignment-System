<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocastid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>OCAS Teacher : Dashboard</title>
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
                        $cid=$_SESSION['ocastcid'];
$sql ="SELECT * from  tbluser where Cid=:cid ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':cid', $cid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totuser=$query->rowCount();
?>
                                        <h4 style="color: blue">Total Students</h4>
                                        <h4 style="color: blue"><?php echo htmlentities($totuser);?></h4>
                                        <a href="reg-coursewiseusers.php"><h5>View Detail</h5></a>
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
                       $tid=$_SESSION['ocastid'];
$sql ="SELECT tblcourse.ID,tblcourse.BranchName,tblcourse.CourseName,tblsubject.SubjectFullname,tblsubject.SubjectCode,tblassigment.AssignmentNumber,tblassigment.AssignmenttTitle,tblassigment.SubmissionDate from tblassigment join tblcourse on tblcourse.ID=tblassigment.Cid join tblsubject on tblsubject.ID=tblassigment.Sid where tblassigment.Tid=:tid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':tid', $tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totassign=$query->rowCount();
?>
                                        <h4 style="color: blue">Total Assignment</h4>
                                         <h4 style="color: blue"><?php echo htmlentities($totassign);?></h4>
                                         <a href="manage-assignment.php"><h5>View Detail</h5></a>
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
                       $tid=$_SESSION['ocastid'];
$sql="SELECT * from tblnewsbyteacher where TeacherID=:tid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':tid', $tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totnews=$query->rowCount();
?>
                                       <h4 style="color: blue">Total Announcement</h4>
                                         <h4 style="color: blue"><?php echo htmlentities($totnews);?></h4>
                                         <a href="newsorannouncement.php"><h5>View Detail</h5></a>
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