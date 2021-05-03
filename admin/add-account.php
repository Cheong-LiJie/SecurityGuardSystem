<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit'])){
 $clientmsaid=$_SESSION['clientmsaid'];
 $name=$_POST['name'];
 $pw=md5($_POST['pw']);
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
 
$sql="insert into tblaccount( Name, Password,Phone, WorkingPermitDueDate, Race, Nationality, Age, Position,PassportNo, Visa_Status,Status,Picture, Medical_CheckUp, Passport_Copy,other) values(:name,:pw,:phone,:permitdate,:race,:nationality,:age,:position,:ppno,:visastatus,:status,:picture,:medical,:ppcopy,:other)";
$query=$dbh->prepare($sql);
$acctid=$dbh->lastInsertId();
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':pw',$pw,PDO::PARAM_STR);
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

$query->execute();
echo "<script type='text/javascript'>alert('Successfully added new guard!');</script>";
echo "<script>document.location='account-list.php'</script>";   
}
  
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Security Guard Management Sysytem|| Add Account</title>

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
	
<?php include_once('includes/header.php');?>
				<!--//outer-wp-->
<div class="outter-wp">
					<!--/sub-heard-part-->
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="dashboard.php">Home</a></li>
<li class="active"style="color:white;">Add Account</li>
<div class="datebar" style="float: right;color:white;"><span  class = "label label-info"><i class="fa fa-calendar"></i></span> <?php echo date("F d, Y");?></div>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<div class="graph-form">
<div class="form-body">
<form method="post"> 

<div class="row">
<div class="form-group col-xs-3"> <label>Name</label> <input type="text" name="name" value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Password</label> <input  type="password" name="pw"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Position</label>
	<select style="height:50px" name="position"  class="form-control" required='true'>
		<option value="Manager">Manager</option>
		<option value="Senior Guard">Senior guard</option>
		<option value="Junior">Junior guard</option>
		<option value="Trainee">Trainee</option>
	</select> </div>
	<div class="form-group col-xs-3"> <label>Visa Status</label>
	<select style="height:50px" name="visastatus"  class="form-control" required='true'>
		<option value="Immigrant">Immigrant Visa</option>
		<option value="Non-immigrant">Non-immigrant Visa</option>
		<option value="Temporary worker">Temporary Worker Visa</option>
	</select> </div> 
</div>
<div class="row">
<div class="form-group col-xs-3"> <label>Phone</label> <input type="text" name="phone"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Work Permit due date</label> <input type="date" name="permitdate"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Race</label> <input type="text" name="race"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Nationality</label> <input type="text" name="nationality"  value="" class="form-control" required='true'> </div>
</div>
<div class="row">
<div class="form-group col-xs-3"> <label>Age</label> <input type="text" name="age"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Passport Number</label> <input type="text" name="ppno"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Status</label> <input type="text" name="status"  value="Active" class="form-control" required='true' readonly> </div>
</div> 
<div class="row">
</div> 
<div class="row">
<div class="form-group col-xs-6"> <label>Profile Image</label><input type="file" name="picture" ><!--<img id="profile" src="#" alt="Profile Picture" width="100px" height="100px" />--></div>
<div class="form-group col-xs-6"> <label>Medical Check up</label><input type="file" name="medical" ></div>
</div>
<div class="row">
<div class="form-group col-xs-6"> <label>Passport copy</label><input type="file"  name="ppcopy" ></div>
<div class="form-group col-xs-6"> <label>Other</label><input type="file" name="other" ></div>
</div>
<div>
<button type="submit" class="btn btn-default" name="submit" id="submit">Save</button> </form> 
<input type="button" class="btn btn-default" value="Back" onClick="history.back();return true;">
</div>
</div> 
</div> 
</div>
<?php include_once('includes/footer.php');?>
</div>
</div>		
<?php include_once('includes/sidebar.php');?>		
</div>

<!--<script type="text/javascript">

var reader2 = new FileReader();
    function readURL(input) {
		var reader = new FileReader();
        if (input.files && input.files[0]) {
            reader.onload = function (e) {
                $('#profile').attr('src', e.target.result);
			} 
		}
		else if(input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
                $('#medical').attr('src', e.target.result);
            }
		}
			else{
			var reader2 = new FileReader();
			reader2.onload = function (e) {
                $('#medical').attr('src', e.target.result);
            }
		}
            reader.readAsDataURL(input.files[0]);
			reader2.readAsDataURL(input.files[1]);
        }
</script>-->
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