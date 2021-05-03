<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit'])){

 $clientmsaid=$_SESSION['clientmsaid'];
 $cname=$_POST['cname'];
 $comname=$_POST['comname'];
 $password=($_POST['password']);
 $address=$_POST['address'];
 $city=$_POST['city'];
 $state=$_POST['state'];
 $postcode=$_POST['postcode'];
 $wphnumber=$_POST['wphnumber'];
 $cellphnumber=$_POST['cellphnumber'];
 $email=$_POST['email'];
 $status=$_POST['status'];

$sql="insert into tblclient(ContactName,CompanyName,Password,Address,City,State,Postcode,Workphnumber,Cellphnumber,Email,Status)values(:cname,:comname,:password,:address,:city,:state,:postcode,:wphnumber,:cellphnumber,:email,:status)";
$query=$dbh->prepare($sql);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
$query->bindParam(':comname',$comname,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':postcode',$postcode,PDO::PARAM_STR);
$query->bindParam(':wphnumber',$wphnumber,PDO::PARAM_STR);
$query->bindParam(':cellphnumber',$cellphnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Client has been added.")</script>';
echo "<script>document.location='manage-client.php'</script>"; 
  }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem|| Add Clients</title>

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
<li class="active"style="color:white;">Add Clients</li>
<div class="datebar"style="float: right;color:white;"><span  class = "label label-info"><i class="fa fa-calendar"></i></span> <?php echo date("F d, Y");?></div>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<div class="graph-form">
<div class="form-body">
<form method="post"> 

<div class="row">
<div class="form-group col-xs-4"> <label>Contact Name</label> <input  type="text" name="cname"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-4"> <label>Company Name</label> <input type="text" name="comname" value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-4"> <label>Password</label> <input  type="password" name="password"  value="" class="form-control" required='true'> </div>
</div>

<div class="row">
<div class="form-group col-xs-3"> <label>Address</label> <input type="text" name="address"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>City</label> <input type="text" name="city"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>State</label> <input type="text" name="state"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Postcode</label> <input type="text" name="postcode"  value="" class="form-control" required='true'> </div>
</div>

<div class="row">
<div class="form-group col-xs-3"> <label>Work Phone No</label> <input type="text" name="wphnumber"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Cell Phone No</label> <input type="text" name="cellphnumber"  value="" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Email</label> <input type="text" name="email"  value="" class="form-control" required='true' > </div>
<div class="form-group col-xs-3"> <label>Status</label> <input type="text" name="status"  value="Active" class="form-control" required='true' readonly> </div>
</div> 
<div>
<button type="submit" class="btn btn-default" name="submit" id="submit">Save</button> 
<input type="button" class="btn btn-default" value="Back" onClick="history.back();return true;"></form> 
</div>
</div> 
</div> 
</div>
<?php include_once('includes/footer.php');?>
</div>
</div>		
<?php include_once('includes/sidebar.php');?>	
</div>
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