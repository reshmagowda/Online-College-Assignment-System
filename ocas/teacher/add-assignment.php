<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocastid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$tid=$_SESSION['ocastid'];
$cid=$_POST['cid'];
$subdata=$_POST['sid'];
$data=explode("-", $subdata);
$sid=$data['0'];
$subcode=$data['1'];
$asstitle=$_POST['asstitle'];
$assdesc=$_POST['assdesc'];
$lsdate=$_POST['lsdate'];
$assmarks=$_POST['assmarks'];
$file=$_FILES["assfile"]["name"];
$assignno=mt_rand(10000, 99999);
$asgnnumber=$subcode."-".$assignno;
$extension = substr($file,strlen($file)-4,strlen($file));
$allowed_extensions = array("docs",".doc",".pdf");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('File has Invalid format. Only docs / doc/ pdf format allowed');</script>";
}
else
{

$file=md5($file).time().$extension;
 move_uploaded_file($_FILES["assfile"]["tmp_name"],"assignmentfile/".$file);
$sql="insert into tblassigment(Tid,Cid,Sid,AssignmentNumber,AssignmenttTitle,AssignmentDescription,SubmissionDate,AssigmentMarks,AssignmentFile)values(:tid,:cid,:sid,:asgnnumber,:asstitle,:assdesc,:lsdate,:assmarks,:file)";
$query=$dbh->prepare($sql);
$query->bindParam(':tid',$tid,PDO::PARAM_STR);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':asgnnumber',$asgnnumber,PDO::PARAM_STR);
$query->bindParam(':asstitle',$asstitle,PDO::PARAM_STR);
$query->bindParam(':assdesc',$assdesc,PDO::PARAM_STR);
$query->bindParam(':lsdate',$lsdate,PDO::PARAM_STR);
$query->bindParam(':assmarks',$assmarks,PDO::PARAM_STR);
$query->bindParam(':file',$file,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("New assignment has been added.")</script>';
echo "<script>window.location.href ='add-assignment.php'</script>";
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
  
    <title>OCAS : Add Assignment </title>

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
                                <h1>Add Assignment</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Assignment Information</li>
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
                            <div class="card-header m-b-20">
                                <h4>Assignment Information</h4>
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

                                <div class="col-md-6">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <label>Course</label>
                                            <?php
                                            $tid=$_SESSION['ocastid'];
$sql="SELECT tblcourse.ID as cid,tblcourse.BranchName,tblcourse.CourseName,tblteacher.* from tblteacher join tblcourse on tblcourse.ID=tblteacher.CourseID where tblteacher.ID=$tid";

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{            
$crid=$row->cid;

   ?>

                                            <select type="text" class="form-control border-none input-flat bg-ash" name="cid" required="true">
            <option value="<?php  echo $row->cid;?>"><?php  echo htmlentities($row->CourseName);?>(<?php  echo htmlentities($row->BranchName);?>)</option>
                                                <?php $cnt=$cnt+1;}} ?></select>
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-6">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <select class="form-control border-none input-flat bg-ash" name="sid" required="true">
            <option value="">Select Subject</option>
            <?php
$sql="SELECT tblsubject.CourseID,tblsubject.SubjectFullname,tblsubject.SubjectShortname,tblsubject.SubjectCode,tblsubject.ID as sid from tblsubject  where tblsubject.CourseID=$crid ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{               ?>
            <option value="<?php  echo htmlentities($row->sid."-".$row->SubjectCode);?>"><?php  echo htmlentities($row->SubjectFullname);?></option>
              <?php } ?>
        </select>
      
                                        </div>
                                    </div>
                                </div>
                                
                              
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <label>Assignment Title</label>
                                            <input type="text" class="form-control border-none input-flat bg-ash" name="asstitle" required="true">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <label>Assignment Description</label>
                                            <textarea type="text" class="form-control border-none input-flat bg-ash" name="assdesc" required="true"></textarea>
                                        </div>
                                    </div>
                                </div>
                               
                             
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <label>Last Date of Submission</label>
                                            <input type="date" class="form-control border-none input-flat bg-ash" name="lsdate" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <label>Assignment Marks</label>
                                            <input type="text" class="form-control border-none input-flat bg-ash" name="assmarks" required="true">
                                        </div>
                                    </div>
                                </div>
                               
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="basic-form">
                                        <div class="form-group image-type">
                                            <label>Assignment File  <span>(if any)</span></label>
                                            <input type="file" name="assfile" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-default btn-lg m-b-10 bg-warning border-none m-r-5 sbmt-btn" type="submit" name="submit">Save</button>
                            <button class="btn btn-default btn-lg m-b-10 m-l-5 sbmt-btn" type="reset">Reset</button>
                        </form>
                        </div>
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