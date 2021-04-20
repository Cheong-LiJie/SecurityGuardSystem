<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$accountmsaid=$_SESSION['clientmsaid'];
 $acctid=mt_rand(100000000, 999999999);
 $picture=$_POST['picture'];
 $name=$_POST['name'];
 $pw=md5($_POST['pw']);
 $phone=$_POST['phone'];
 $status=$_POST['status'];
 $race=$_POST['race'];
 $nationality=$_POST['nationality'];
 $age=$_POST['age'];
 $gender=$_POST['gender'];
 $position=$_POST['position'];
 $ppno=$_POST['ppno'];
 $visastatus=$_POST['visastatus'];
 $medicalcheck=$_POST['medicalcheck'];
 $ppcopy=$_POST['ppcopy'];
 $permitdate=$_POST['permitdate'];
 
$sql="insert into tblaccount(`AccountID`, `Picture`, `Name`, `Password`, `Phone`, `Status`, `Race`, `Nationality`, `Age`, `Gender`, `Position`,`PassportNo.`, `Visa Status`, `Medical check-up`, `Passport Copy`, `WorkingPermitDueDate`))";
$query=$dbh->prepare($sql);
$query->bindParam(':acctid',$acctid,PDO::PARAM_STR);
$query->bindParam(':picture',$picture,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':pw',$pw,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':race',$race,PDO::PARAM_STR);
$query->bindParam(':nationality',$nationality,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':position',$position,PDO::PARAM_STR);
$query->bindParam(':ppno',$ppno,PDO::PARAM_STR);
$query->bindParam(':visastatus',$visastatus,PDO::PARAM_STR);
$query->bindParam(':medicalcheck',$medicalcheck,PDO::PARAM_STR);
$query->bindParam(':ppcopy',$ppcopy,PDO::PARAM_STR);
$query->bindParam(':permitdate',$permitdate,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Client has been added.")</script>';
echo "<script>window.location.href ='add-account.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

$image_name=$_FILES['banner_image']['name'];
       $temp = explode(".", $image_name);
        $newfilename = round(microtime(true)) . '.' . end($temp);
       $imagepath="uploads/".$newfilename;
       move_uploaded_file($_FILES["banner_image"]["tmp_name"],$imagepath);

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
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
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
<body>
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
<li class="active">Add Account</li>
</ol>
</div>	


					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Add Account </h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 

<div class="row">
<div class="form-group col-xs-3"> <label>Account ID</label> <input type="text" name="acctid"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Name</label> <input type="text" name="name" value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Password</label> <input type="text" name="pw"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Confirm password</label> <input type="text"  value="" class="form-control" required='true'> </div>
</div>
<div class="row">
<div class="form-group col-xs-3"> <label>Phone</label> <input type="text" name="phone"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label for="exampleInputEmail1">Work Permit due date</label> <input type="text" name="permitdate"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Race</label> <input type="text" name="race"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Nationality</label> <input type="text" name="nationality"  value="" class="form-control" required='true'> </div>
</div>
<div class="row">
<div class="form-group col-xs-3"> <label>Age</label> <input type="text" name="age"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label for="exampleInputEmail1">Passport Number</label> <input type="text" name="ppno"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Position</label>
	<select style="height:50px" name="position"  class="form-control" required='true'>
		<option value="Manager">Manager</option>
		<option value="Senior Guard">Senior guard</option>
		<option value="Junior">Junior guard</option>
		<option value="Trainee">Trainee</option>
	</select> </div>
<div class="form-group col-xs-3"> <label for="exampleInputEmail1">Visa Status</label>
	<select style="height:50px" name="visastatus"  class="form-control" required='true'>
		<option value="Immigrant">Immigrant Visa</option>
		<option value="Non-immigrant">Non-immigrant Visa</option>
		<option value="Temporary worker">Temporary Worker Visa</option>
	</select> </div> 
</div> 
<div class="row">
<div class="form-group col-xs-3"> <label>Status</label> <input type="text" name="status"  value="Active" class="form-control" required='true' readonly> </div>
</div> 
<div class="row">
<div class="form-group col-xs-6"> <label>Profile Image</label><input type="file" onchange="readURL(this)" name="profile" ><img id="profile" src="#" alt="Profile Picture" width="100px" height="100px" /></div>
<div class="form-group col-xs-6"> <label>Medical Check up</label><input type="file" onchange="readURL(this)" name="medical" ><img id="medical" src="#Medical" alt="Medical check up" width="100px" height="100px" /></div>
</div>
<div class="row">
<div class="form-group col-xs-6"> <label>Passport copy</label><input type="file" onchange="readURL(this)" name="passport" ><img id="passport" src="#" alt="Passport copy" width="100px" height="100px" /></div>
<div class="form-group col-xs-6"> <label>Other</label><input type="file" onchange="readURL(this)" name="other" ><img id="other" src="#" alt="Other" width="100px" height="100px" /></div>
</div>
<div>
<button type="submit" class="btn btn-default" name="submit" id="submit">Save</button> </form> 
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
<script type="text/javascript">

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
</script>
<script>
		var toggle = true;
		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
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