<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit'])){
$eid=$_GET['editid'];
$clientmsaid=$_SESSION['clientmsaid'];
 $cname=$_POST['cname'];
 $comname=$_POST['comname'];
 $address=$_POST['address'];
 $city=$_POST['city'];
 $state=$_POST['state'];
 $postcode=$_POST['postcode'];
 $wphnumber=$_POST['wphnumber'];
 $cellphnumber=$_POST['cellphnumber'];
 $email=$_POST['email'];
 $status=$_POST['status'];
 
$sql="update tblclient set ContactName=:cname,CompanyName=:comname,Address=:address,City=:city,State=:state,Postcode=:postcode,Workphnumber=:wphnumber,Cellphnumber=:cellphnumber,Email=:email,Status=:status where client_id=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
$query->bindParam(':comname',$comname,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':postcode',$postcode,PDO::PARAM_STR);
$query->bindParam(':wphnumber',$wphnumber,PDO::PARAM_STR);
$query->bindParam(':cellphnumber',$cellphnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Client details has been updated")</script>';
echo "<script type='text/javascript'> document.location ='manage-client.php'; </script>";
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem|| Update Clients</title>

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
<li class="active"style="color:white;">Update Clients</li>
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
$sql="SELECT * from tblclient where client_id=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
foreach($results as $row){               ?>								
	<div class="row">
<div class="form-group col-xs-4"> <label>Contact Name</label> <input  type="text" name="cname"  value="<?php  echo $row->ContactName;?>" class="form-control" required='true'> </div>
<div class="form-group col-xs-4"> <label>Company Name</label> <input type="text" name="comname" value="<?php  echo $row->CompanyName;?>" class="form-control" required='true'> </div></div>

<div class="row">
<div class="form-group col-xs-3"> <label>Address</label> <input type="text" name="address"  value="<?php  echo $row->Address;?>" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>City</label> <input type="text" name="city"  value="<?php  echo $row->City;?>" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>State</label> <input type="text" name="state"  value="<?php  echo $row->State;?>" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Postcode</label> <input type="text" name="postcode"  value="<?php  echo $row->Postcode;?>" class="form-control" required='true'> </div>
</div>

<div class="row">
<div class="form-group col-xs-3"> <label>Work Phone No</label> <input type="text" name="wphnumber"  value="<?php  echo $row->Workphnumber;?>" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Cell Phone No</label> <input type="text" name="cellphnumber"  value="<?php  echo $row->Cellphnumber;?>" class="form-control" required='true'> </div>
<div class="form-group col-xs-3"> <label>Email</label> <input type="text" name="email"  value="<?php  echo $row->Email;?>" class="form-control" required='true' > </div>
<div class="form-group col-xs-3"> <label>Status</label>
	<select style="height:50px" name="status"  class="form-control" value="<?php  echo $row->Status;?>">
		<option value="Active">Active</option>
		<option value="Inactive">Inactive</option>
        <option value="BlackList">BlackList</option>
	</select> </div> </div> <?php $cnt=$cnt+1;}} ?>
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