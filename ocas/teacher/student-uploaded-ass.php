<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocastid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>OCAS Manage Assignment</title>

    <!-- Styles -->
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/datatable/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/datatable/buttons.bootstrap.min.css" rel="stylesheet" />
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
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Manage Assignment</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Manage Assignment</h4>
                                    <div class="card-header-right-icon">
                                        <ul>
                                            <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                            <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Assignment Number</th>
                                                    <th>Course Name</th>
                                                    <th>Subject</th>
                                                    <th>Submitted By</th>
                                                    <th>Submitted Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tid=$_SESSION['ocastid'];
$sql="SELECT tblcourse.ID,tblcourse.BranchName,tblcourse.CourseName,tblsubject.SubjectFullname,tblsubject.SubjectCode,tblassigment.AssignmentNumber,tblassigment.AssignmenttTitle,tblassigment.SubmissionDate,tblassigment.CreationDate,tblteacher.ID,tblteacher.FirstName,tblteacher.LastName,tbluploadass.UserID,tbluploadass.AssId,tbluploadass.AssDes,tbluploadass.AnswerFile,tbluploadass.SubmitDate,tbluser.ID, tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tbluser.Cid,tbluser.RollNumber from tblassigment join tblcourse on tblcourse.ID=tblassigment.Cid join tblsubject on tblsubject.ID=tblassigment.Sid join tblteacher on tblteacher.ID=tblassigment.Tid join tbluploadass on tblassigment.ID=tbluploadass.AssId join tbluser on tbluploadass.UserID=tbluser.ID where tblassigment.Tid=$tid && tblassigment.Cid=$cid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
    $cid=$row->Cid
                                                <tr>
                                                    <td><?php echo htmlentities($cnt);?></td>
                                                    <td><?php  echo htmlentities($row->AssignmentNumber);?> </td>
                                                    <td><?php  echo htmlentities($row->CourseName);?>(<?php  echo htmlentities($row->BranchName);?>)</td>
                                                    <td><?php  echo htmlentities($row->SubjectFullname);?>(<?php  echo htmlentities($row->SubjectCode);?>)</td>
                                                    <td><?php  echo htmlentities($row->FullName);?>(<?php  echo htmlentities($row->RollNumber);?>)</td>
                                                    <td><?php  echo htmlentities($row->SubmitDate);?></td>
                                                  
                                                    <td><a href="submit-assignment.php?sid=<?php echo htmlentities ($row->ID);?>">Submit</a></td>
                                                </tr>
                                              <?php $cnt=$cnt+1;}} ?> 
                                            </tbody>
                                        </table>
										<div class="row">
                        <div class="col-md-12">
                            <div class="page-nation text-center">
                                <ul class="pagination pagination-large">
                                    <li class="disabled"><span>«</span></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li class="hidden-xs"><a href="#">3</a></li>
                                    <li class="hidden-xs"><a href="#">4</a></li>
                                    <li class="hidden-xs"><a href="#">6</a></li>
                                    <li class="hidden-xs"><a href="#">7</a></li>
                                    <li class="hidden-xs"><a href="#">8</a></li>
                                    <li class="hidden-xs"><a href="#">9</a></li>
                                    <li class="disabled hidden-xs"><span>...</span></li><li>
                                    <li><a rel="next" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>This dashboard was generated on <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- jquery vendor -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../assets/js/lib/menubar/sidebar.js"></script>
    <script src="../assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <!-- scripit init-->

</body>

</html><?php }  ?>