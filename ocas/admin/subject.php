<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$ocasaid=$_SESSION['ocasaid'];
 $cid=$_POST['cid'];
 $sfname=$_POST['sfname'];
 $ssname=$_POST['ssname'];
 $subcode=$_POST['subcode'];

$sql="insert into tblsubject(CourseID,SubjectFullname,SubjectShortname,SubjectCode)values(:cid,:sfname,:ssname,:subcode)";
$query=$dbh->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':sfname',$sfname,PDO::PARAM_STR);
$query->bindParam(':ssname',$ssname,PDO::PARAM_STR);
$query->bindParam(':subcode',$subcode,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Subject has been added.")</script>';
echo "<script>window.location.href ='subject.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
// Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblsubject where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'subject.php'</script>";     


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>OCAS : Subject Create</title>

       <!-- Styles -->
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
                                <h1>Subject</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Subject</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card alert">
                                <div class="card-header pr">
                                    <h4>Create A New Subject</h4>
                                    <form method="post" name="hjhgh">
                                        <div class="basic-form m-t-20">
                                            <div class="form-group">
                                                <label>Course Name</label>
        <select class="form-control border-none input-flat bg-ash" name="cid" required="true">
            <option value="">Select Course</option>
            <?php
$sql="SELECT * from tblcourse";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
            <option value="<?php  echo htmlentities($row->ID);?>"><?php  echo htmlentities($row->CourseName);?>(<?php  echo htmlentities($row->BranchName);?>)</option><?php $cnt=$cnt+1;}} ?>
        </select>
                                            </div>
                                        </div>
                                        <div class="basic-form m-t-20">
                                            <div class="form-group">
                                                <label>Subject Full Name</label>
                                                <input type="text" class="form-control border-none input-flat bg-ash" placeholder="Subject Full Name" name="sfname" required="true">
                                            </div>
                                        </div>
                                    <div class="basic-form m-t-20">
                                            <div class="form-group">
                                                <label>Subject Short Name</label>
                                                <input type="text" class="form-control border-none input-flat bg-ash" placeholder="Subject Short Name" name="ssname" required="true">
                                            </div>
                                        </div>
                                        <div class="basic-form m-t-20">
                                            <div class="form-group">
                                                <label>Subject Code</label>
                                                <input type="text" class="form-control border-none input-flat bg-ash" placeholder="Subject Code" name="subcode" required="true">
                                            </div>
                                        </div>
                                </div>
                                <button class="btn btn-default btn-lg m-b-10 bg-warning border-none m-r-5 sbmt-btn" type="submit" name="submit">Save</button>
                                <button class="btn btn-default btn-lg m-b-10 m-l-5 sbmt-btn" type="reset">Reset</button> 
                            </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card alert">
                                <div class="card-header pr">
                                    <h4>ALL Subject</h4>
                                    
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
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table student-data-table m-t-20">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Course Name</th>
                                                    <th>Subject Full Name</th>
                                                    <th>Subject Short Name</th>
                                                    <th>Subject Code</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$sql="SELECT tblcourse.CourseName,tblcourse.BranchName,tblcourse.ID as cid,tblsubject.SubjectFullname,tblsubject.SubjectShortname,tblsubject.SubjectCode, tblsubject.ID as sid from tblsubject join tblcourse on tblcourse.ID=tblsubject.CourseID";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt);?></td>
                                                    <td>
                                                        <?php  echo htmlentities($row->CourseName);?>(<?php  echo htmlentities($row->BranchName);?>)
                                                    </td>
                                                    <td>
                                                        <?php  echo htmlentities($row->SubjectFullname);?>
                                                    </td>
                                                    <td>
                                                        <?php  echo htmlentities($row->SubjectShortname);?>
                                                    </td>
                                                     <td>
                                                        <?php  echo htmlentities($row->SubjectCode);?>
                                                    </td>
                                                    <td>
                                                       
                                                        <span><a href="edit-subject.php?editid=<?php echo htmlentities ($row->sid);?>"><i class="ti-pencil-alt color-success"></i></a></span>
                                                        <span><a href="subject.php?delid=<?php echo ($row->sid);?>"  onclick="return confirm('Do you really want to Delete ?');"><i class="ti-trash color-danger"></i> </a></span>
                                                    </td>
                                                </tr>
                                                 <?php $cnt=$cnt+1;}} ?> 
                                            </tbody>
                                        </table>
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
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../assets/js/lib/menubar/sidebar.js"></script>
    <script src="../assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/scripts.js"></script>
</body>

</html><?php }  ?>