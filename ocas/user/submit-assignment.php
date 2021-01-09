<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{



$asid=$_GET['sid'];
$userid= $_SESSION['ocasuid'];
$assdes= $_POST['assdes'];
$ansfile=$_FILES["ansfile"]["name"];


$extension = substr($ansfile,strlen($ansfile)-4,strlen($ansfile));
// allowed extensions
$allowed_extensions = array(".docs",".pdf",".doc");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Answer has Invalid format. docs and pdf format allowed');</script>";
}
else
{

$ansfile=md5($ansfile).time().$extension;
move_uploaded_file($_FILES["ansfile"]["tmp_name"],"assignanswer/".$ansfile);


$sql="insert into tbluploadass(UserID,AssId,AssDes,AnswerFile)values(:userid,:asid,:assdes,:ansfile)";
$query=$dbh->prepare($sql);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':asid',$asid,PDO::PARAM_STR);
$query->bindParam(':assdes',$assdes,PDO::PARAM_STR);
$query->bindParam(':ansfile',$ansfile,PDO::PARAM_STR);


 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Answer sheet of assignment has been added.")</script>';
echo "<script>window.location.href ='assignment.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}


  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <title>OCAS : Submit Assignment </title>

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
                                    <li class="active">Submit Assignment</li>
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
                                    $sid=$_GET['sid'];
$sql="SELECT tblcourse.ID,tblcourse.BranchName,tblcourse.CourseName,tblsubject.SubjectFullname,tblsubject.SubjectCode,tblassigment.AssignmentNumber,tblassigment.AssignmenttTitle,tblassigment.SubmissionDate,tblassigment.AssignmentDescription,tblassigment.AssigmentMarks,tblassigment.AssignmentFile from tblassigment join tblcourse on tblcourse.ID=tblassigment.Cid join tblsubject on tblsubject.ID=tblassigment.Sid where tblassigment.ID=$sid";
$query = $dbh -> prepare($sql);
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
                             <?php $cnt=$cnt+1;}} ?>
                            </div>
                            <?php
$asid=$_GET['sid'];
$userid= $_SESSION['ocasuid'];                         
$ret="select UserId,AssDes,AnswerFile,SubmitDate,Remarks,Marks from tbluploadass where UserId=:userid && AssId=:asid";
   $query = $dbh -> prepare($ret);
   $query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':asid',$asid,PDO::PARAM_STR);
   $query->execute();
   $results=$query->fetchAll(PDO::FETCH_OBJ);
 
    if($query -> rowCount() == 0){
                            ?>

                <div class="row">          
<table class="table table-bordered table-hover data-tables">
<form method="post" name="submit" enctype="multipart/form-data">
    <tr>
    <th><strong>Assignment Description</strong></th>
    <td>
    <textarea  name="assdes" placeholder="Assignment Description" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>
<tr>
    <th><strong>Upload Answer File </strong></th>
    <td>
    <input type='file' name="ansfile" placeholder="resume" rows="12" cols="14" class="form-control wd-450" required="true"></td>
  </tr>
  <?php
$cdate=date('Y-m-d');
$lldate = date("Y-m-d", strtotime($ldate));
if(($cdate < $lldate ))
{
    ?>
    <tr align="center">
    <td colspan="3"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
  </tr>
  <?php } else {?>
  <tr>
<th colspan="2" style="text-align:center; font-weight:bold; color:red; font-size:22px;">Date of Submission Over</th>
  </tr>
<?php } ?>

<?php }  else { 
foreach($results as $data){?>
    <br>
    <table class="table table-bordered table-hover data-tables">
        <tr ><td colspan="6" style="text-align: center;color: blue"><strong>Submitted Assignment Details</strong></td></tr>
  <tr>
    <th><strong>Assignment Description </strong></th>
    <td colspan="6" style="text-align: center;"><?php echo $data->AssDes?></td>
    
</tr>
<tr>
    <th><strong>View Submitted Answer Paper </strong></th>
    <td colspan="3" style="text-align: center;"><a href="assignanswer/<?php echo $data->AnswerFile;?>" width="100" height="100" target="_blank"> <strong style="color: blue">View Answer Paper</strong></a></td>
    <th><strong>Submitted Date </strong></th>
    <td><?php echo $data->SubmitDate?></td>
</tr>
<tr>
    <th><strong>Marks </strong></th>
    <?php if($data->Marks==""){ ?>
      <td colspan="2"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td colspan="2" style="text-align: center;"><?php echo $data->Marks?></td> <?php } ?>
    <th colspan="2"><strong>Remarks </strong></th>
     <?php if($data->Marks==""){ ?>
      <td colspan="2" ><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td  colspan="2" style="text-align: center;"><?php echo $data->Remarks?></td> <?php } ?>

</tr>
</table>
<table class="table table-bordered table-hover data-tables">


</table>
<?php }} ?>
  

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