<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit'])){
$eid=$_GET['editid'];
$clientmsaid=$_SESSION['clientmsaid'];
$name=$_POST['name'];
 $phone=$_POST['phone'];
 $status=$_POST['status'];
 $race=$_POST['race'];
 $nationality=$_POST['nationality'];
 $age=$_POST['age'];
 $position=$_POST['position'];
 $ppno=$_POST['ppno'];
 $visastatus=$_POST['visastatus'];
 $picture=$_POST['picture'];
 $medical=$_POST['medical'];
 $ppcopy=$_POST['ppcopy'];
 $permitdate=$_POST['permitdate'];
 $other=$_POST['other'];

 
		
$sql="update tblaccount set Name=:name,Phone=:phone,WorkingPermitDueDate=:permitdate,Race=:race,Nationality=:nationality,Age=:age,Position=:position,PassportNo=:ppno,Visa_Status=:visastatus,Status=:status,Picture=:picture,Medical_CheckUp=:medical,Passport_Copy=:ppcopy ,other=:other where AccountID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':permitdate',$permitdate,PDO::PARAM_STR);
$query->bindParam(':race',$race,PDO::PARAM_STR);
$query->bindParam(':nationality',$nationality,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':position',$position,PDO::PARAM_STR);
$query->bindParam(':ppno',$ppno,PDO::PARAM_STR);
$query->bindParam(':visastatus',$visastatus,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':picture',$picture,PDO::PARAM_STR);
$query->bindParam(':medical',$medical,PDO::PARAM_STR);
$query->bindParam(':ppcopy',$ppcopy,PDO::PARAM_STR);
$query->bindParam(':other',$other,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Account detail has been updated")</script>';
echo "<script type='text/javascript'> document.location ='account-list.php'; </script>";
  }

  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem|| Update Account</title>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href="css/google-font.css" rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>
	<!--//skycons-icons-->
</head> 
<body style="background-image: url('http://localhost/SecurityGuardSystem/admin/images/bg.jpg');">
<div class="page-container">
<!--/content-inner-->
<div class="left-content">
<div class="inner-content">
	
<?php //include_once('includes/header.php');?>
				<!--//outer-wp-->
<div class="outter-wp">
					<!--/sub-heard-part-->
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="dashboard.php">Home</a></li>
<li class="active"style="color:white;">Update Account</li>
<div class="datebar" style="float: right;color:white;"><span  class = "label label-info"><i class="fa fa-calendar"></i></span> <?php echo date("F d, Y");?></div>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<div class="graph-form">
<div class="form-body">
<form method="post"> 

<?php
$eid=$_GET['editid'];
$sql="SELECT * from tblaccount where AccountID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
foreach($results as $row){               ?>								
	<div class="row">
<div class="form-group col-xs-4"> <label>Name</label> <input type="text" name="name" value="<?php  echo $row->Name;?>" class="form-control" required='true'> </div>
<div class="form-group col-xs-4"> <label>Position</label>
	<select style="height:50px" name="position"  class="form-control" required='true' value="<?php  echo $row->Position;?>">
		<option value="Manager">Manager</option>
		<option value="Senior Guard">Senior guard</option>
		<option value="Junior">Junior guard</option>
		<option value="Trainee">Trainee</option>
	</select> </div>
<div class="form-group col-xs-4"> <label>Visa Status</label>
	<select style="height:50px" name="visastatus"  class="form-control" required='true' value="<?php  echo $row->Visa_Status;?>">
		<option value="Immigrant">Immigrant Visa</option>
		<option value="Non-immigrant">Non-immigrant Visa</option>
		<option value="Temporary worker">Temporary Worker Visa</option>
	</select> </div> 
</div> 
</div>
	<div class="row">
		<div class="form-group col-xs-3"> <label>Phone</label> <input type="text" name="phone"  value="<?php  echo $row->Phone;?>" class="form-control" required='true'> </div>
		<div class="form-group col-xs-3"> <label>Work Permit due date</label> <input type="date" name="permitdate"  value="<?php  echo $row->WorkingPermitDueDate;?>" class="form-control" required='true'> </div>
		<div class="form-group col-xs-3"> <label>Race</label> <input type="text" name="race"  value="<?php  echo $row->Race;?>" class="form-control" required='true'> </div>
		<div class="form-group col-xs-3"> <label>Nationality</label> <input type="text" name="nationality"  value="<?php  echo $row->Nationality;?>" class="form-control" required='true'> </div>
</div>
	<div class="row">
		<div class="form-group col-xs-3"> <label>Age</label> <input type="text" name="age"  value="<?php  echo $row->Age;?>" class="form-control" required='true'> </div>
		<div class="form-group col-xs-3"> <label>Passport Number</label> <input type="text" name="ppno"  value="<?php  echo $row->PassportNo;?>" class="form-control" required='true'> </div>

<div class="row">
<div class="form-group col-xs-3"> <label>Status</label>
	<select style="height:50px" name="status"  class="form-control" value="<?php  echo $row->Status;?>">
		<option value="Active">Active</option>
		<option value="Inactive">Inactive</option>
        <option value="Retired">Retired</option>
	</select> </div> 
</div> 
	<div class="row">
		<div class="form-group col-xs-6"> <label>Profile Image</label><input type="file" value="<?php  echo $row->Picture;?>" name="picture" ><!--<img id="profile" src="#" alt="Profile Picture" width="100px" height="100px" />--></div>
		<div class="form-group col-xs-6"> <label>Medical Check up</label><input type="file" value="<?php  echo $row->Medical_CheckUp;?>" name="medical" ></div>
</div>
	<div class="row">
		<div class="form-group col-xs-6"> <label>Passport copy</label><input type="file" value="<?php  echo $row->PassportCopy;?>" name="ppcopy" ></div>
		<div class="form-group col-xs-6"> <label>Other</label><input type="file" value="<?php  echo $row->Other;?>" name="other" ></div>
</div>
<?php $cnt=$cnt+1;}} ?>
	 <button type="submit" class="btn btn-default" name="submit" id="submit">Update</button><input type="button" class="btn btn-default" value="Back" onClick="history.back();return true;"> </form> 
</div>
</div>
</div> 
</div>
<?php include_once('includes/footer.php');?>
</div>
</div>		
<?php include_once('includes/sidebar.php');?>
<div class="clearfix"></div>		
</div>
<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle){
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>