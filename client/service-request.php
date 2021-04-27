<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Service Request </title>
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
	<!-- /js -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">Services Request</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
            
					<!--/forms-->
                    <?php
$uid=$_SESSION['clientmsuid'];
$sql="SELECT * from  tblclient where client_id=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<div class="forms-main">
<h2 class="inner-tittle">Services Request </h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 

<h3>Confirm Your Details</h3>
<div class="row">
<div class="form-group col-xs-1"> <label>ID</label> <input type="text" name="comname" value="<?php  echo $row->client_id;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>Company Name</label> <input type="text" name="comname" value="<?php  echo $row->CompanyName;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>Contact Name</label> <input type="text" name="cname" value="<?php  echo $row->ContactName;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-2"> <label>Phone</label> <input type="text" name="phone"  value="<?php  echo $row->Workphnumber;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>Email</label> <input type="text" name="email"  value="<?php  echo $row->Email;?>" class="form-control" required='true' readonly> </div>
</div>

<div class="row">
<div class="form-group col-xs-3"> <label>Address</label> <input type="text" name="address"  value="<?php  echo $row->Address;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>City</label> <input type="text" name="city"  value="<?php  echo $row->City;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>PostCode</label> <input type="text" name="postcode"  value="<?php  echo $row->Postcode;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>State</label> <input type="text" name="State"  value="<?php  echo $row->State;?>" class="form-control" required='true' readonly> </div>
</div> 
<?php $cnt=$cnt+1;}} ?>
<h3>Please fill-in your service request details</h3>
<div class="row">
<div class="form-group col-xs-3"> <label>Require Date</label> <input type="date" name="requiredate"  value="" class="form-control" required='true' > </div>
</div> 

<div class="form-group "> <label>Guard per hours:</label> 
<input type="text" name="guard_hour"  value="" pattern="[0-9]+" style="width: 50px"> Guard
<input type="text" name="guard_hour"  value="" pattern="[0-9]+"  style="width: 50px"> Hours
</div>
<div class="form-group "> <label>Guard per day:  </label> 
<input type="text" name="guard_hour"  value="" pattern="[0-9]+" style="width: 50px"> Guard
<input type="text" name="guard_hour"  value="" pattern="[0-9]+"  style="width: 50px"> Days
</div>
<div class="form-group "> <label>Guard per month:</label> 
<input type="text" name="guard_hour"  value="" pattern="[0-9]+" style="width: 50px"> Guard
<input type="text" name="guard_hour"  value="" pattern="[0-9]+"  style="width: 50px"> Month
</div>
<div class="row">
<div class="form-group col-xs-3"> <label>Remark</label> <input type="text" name="remark"  value="" class="form-control" required='true' > </div>
</div>
<div>
<button type="submit" class="btn btn-default" name="submit" id="submit">Send Request</button> </form> 
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