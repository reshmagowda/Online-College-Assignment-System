<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>OCAS User : Dashboard</title>
  
    <!-- Styles -->
    <link href="../assets/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="../assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/weather-icons.css" rel="stylesheet" />
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
                            <div class="page-title"><?php
$uid=$_SESSION['ocasuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <h1>Hello, <?php  echo $row->FullName;?> <span>  Welcome Here</span></h1><?php $cnt=$cnt+1;}} ?>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-center">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        
                        <!-- /# column -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Notice Board </h4>
                                    <div class="card-header-right-icon">
                                        <ul>
                                            <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                            <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                                <ul class="card-option-dropdown dropdown-menu">
                                                    <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                    <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                    <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                    <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                                </ul>
                                            </li>
                                            <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="recent-comment m-t-15">
                                    <?php
$cid=$_SESSION['ocasucid'];
$sql="SELECT tblteacher.ID,tblteacher.FirstName,tblteacher.LastName,tblteacher.ProfilePic,tblteacher.CourseID,tblnewsbyteacher.ID,tblnewsbyteacher.TeacherID,tblnewsbyteacher.Title,tblnewsbyteacher.Description,tblnewsbyteacher.CreationDate from tblnewsbyteacher join tblteacher on tblteacher.ID=tblnewsbyteacher.TeacherID where tblteacher.CourseID=$cid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="../assets/images/avatar/Important-Announcement-292x300.jpg"  width="50" height="50" alt="..."></a>
                                        </div>
                                        
                                        <div class="media-body">
                                            <h4 class="media-heading color-primary"><?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->LastName);?></h4>
                                            <p style="font-weight: bold"><?php  echo htmlentities($row->Title);?></p>
                                            
                                            <p><?php  echo htmlentities($row->Description);?>
                                                
                                            </p>
                                            <p><?php  echo htmlentities($row->CreationDate);?></p>
                                        </div>
                                        
                                    </div>
                                  <?php $cnt=$cnt+1;}} ?>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>

                        <!-- /# column -->
                        
                    </div>
                    <!-- /# row -->

                   
    <?php include_once('includes/footer.php');?>
                </div>
            </div>
        </div>
    </div>
   
    <!-- jquery vendor -->
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../assets/js/lib/menubar/sidebar.js"></script>
    <script src="../assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <script src="../assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/calendar-2/pignose.init.js"></script>
    <!-- scripit init-->


    <script src="../assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="../assets/js/lib/weather/weather-init.js"></script>
    <script src="../assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="../assets/js/lib/chartist/chartist.min.js"></script>
    <script src="../assets/js/lib/chartist/chartist-init.js"></script>
    <script src="../assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="../assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="../assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <!-- scripit init-->
</body>

</html><?php }  ?>