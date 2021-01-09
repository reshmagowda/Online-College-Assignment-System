<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{

$asid=$_GET['assinid'];
$uid=$_GET['uid'];
$marks= $_POST['marks'];
$remarks= $_POST['remarks'];
$sql= "update tbluploadass set Marks=:marks, Remarks=:remarks where AssId=:asid && UserID=:uid ";
$query=$dbh->prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':asid',$asid,PDO::PARAM_STR);
$query->bindParam(':marks',$marks,PDO::PARAM_STR);
$query->bindParam(':remarks',$remarks,PDO::PARAM_STR);
 $query->execute();

  echo '<script>alert("Remark and Marks has been updated")</script>';
 echo "<script>window.location.href ='student-uploaded-ass.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <title>OCAS : Update Assignment </title>

    <link href="../assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
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
                                <h1>Update Assignment</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Update Assignment Information</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="card alert">
                        <div class="card-body">
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                <?php
                                    $assinid=$_GET['assinid'];
                                    $uid=$_GET['uid'];
$sql="SELECT tblcourse.ID,tblcourse.BranchName,tblcourse.CourseName,tblsubject.SubjectFullname,tblsubject.SubjectCode,tblassigment.AssignmentNumber,tblassigment.AssignmenttTitle,tblassigment.AssignmentFile,tblassigment.SubmissionDate,tblassigment.AssigmentMarks,tblassigment.AssignmentDescription,tblassigment.CreationDate,tblteacher.ID,tblteacher.FirstName,tblteacher.LastName,tbluploadass.UserID,tbluploadass.AssId,tbluploadass.AssDes,tbluploadass.AnswerFile,tbluploadass.SubmitDate,tbluploadass.Marks,tbluploadass.Remarks,tbluploadass.UpdationDate, tbluser.ID as uid, tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tbluser.Cid,tbluser.RollNumber from tblassigment join tblcourse on tblcourse.ID=tblassigment.Cid join tblsubject on tblsubject.ID=tblassigment.Sid join tblteacher on tblteacher.ID=tblassigment.Tid join tbluploadass on tblassigment.ID=tbluploadass.AssId join tbluser on tbluploadass.UserID=tbluser.ID where tblassigment.ID=:assinid && tbluploadass.UserID=:uid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':assinid', $assinid, PDO::PARAM_STR);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
 
                            <div class="card-header m-b-20">

                                <h4 style="color: blue">Assignment Number: <?php  echo htmlentities($row->AssignmentNumber);?><strong style="padding-left: 500px">Marks: <?php  echo htmlentities($row->AssigmentMarks);?></strong></h4>
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
                            <div class="row">

                             <table class="table table-bordered table-hover data-tables">
                              <tr> <td colspan="4" style="text-align: center;color: blue">Submitted By <?php  echo htmlentities($row->FullName);?>  (Roll Number:  <?php  echo htmlentities($row->RollNumber);?>)</td></tr>
                                <tr>
  <th width="200"><strong>Course</strong></th>
  <td><?php  echo htmlentities($row->CourseName);?>(<?php  echo htmlentities($row->BranchName);?>)</td>
  <th><strong>Subject Name</strong></th>
  <td><?php  echo htmlentities($row->SubjectFullname);?></td>
  </tr>
  <tr>
  <th width="200"><strong>Subject Code</strong></th>
  <td><?php  echo htmlentities($row->SubjectCode);?></td>
  <th><strong>Assignment Title</strong></th>
  <td><?php  echo htmlentities($row->AssignmenttTitle);?></td>
  </tr>
  <tr>
  <th width="200"><strong>Assignment Description</strong></th>
  <td><?php  echo htmlentities($row->AssignmentDescription);?></td>
  <th><strong>Last Date of Submission</strong></th>
  <td><?php  echo $ldate=($row->SubmissionDate);?></td>
  </tr>
  <tr>
  <th width="200"><strong>View Assignment Paper</strong></th>
  <td colspan="3" style="text-align: center;"><a href="../teacher/assignmentfile/<?php echo $row->AssignmentFile;?>" width="100" height="100" target="_blank"> <strong style="color: red">View Assignment Paper</strong></a></td>
  
  </tr>
                             </table>
                            
                            </div>
                            
                            <br>

                            <table class="table table-bordered table-hover data-tables">
        <tr ><td colspan="6" style="text-align: center;color: blue"><strong>Submitted Assignment Details</strong></td></tr>
  <tr>
    <th><strong>Assignment Description </strong></th>
    <td colspan="6" style="text-align: center;"><?php echo $row->AssDes?></td>
    
</tr>
<tr>
    <th><strong>View Submitted Answer Paper </strong></th>
    <td colspan="3" style="text-align: center;"><a href="../user/assignanswer/<?php echo $row->AnswerFile;?>" width="100" height="100" target="_blank"> <strong style="color: blue">View Answer Paper</strong></a></td>
    <th><strong>Submitted Date </strong></th>
    <td><?php echo $row->SubmitDate?></td>
</tr>
</table><br>
<?php 

if($row->Marks==""){
?> 
                <div class="row">          
<table class="table table-bordered table-hover data-tables">
<form method="post" name="submit" enctype="multipart/form-data">
<?php }  else { 
?>
    <br>
    
<table class="table table-bordered table-hover data-tables">
<tr>
    <th><strong>Marks </strong></th>
    <?php if($row->Marks==""){ ?>
      <td colspan="2"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td colspan="6" style="text-align: center;"><?php echo $row->Marks?></td> <?php } ?>
    <th><strong>Remarks </strong></th>
     <?php if($row->Marks==""){ ?>
      <td colspan="2"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td colspan="6" style="text-align: center;"><?php echo $row->Remarks?></td> <?php } ?>

</tr>
<?php } ?>
</table>

   <?php $cnt=$cnt+1;}} ?>

  </form>
  </table>
        </div>          </div>
                    </div>
                   
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

    <script src="../assets/js/scripts.js"></script>
</body>

</html><?php }  ?>