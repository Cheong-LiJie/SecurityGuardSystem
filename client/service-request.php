<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
	if(isset($_POST['submit']))
  {

	
	$clientmsaid=$_SESSION['clientmsaid'];

	$cname=$_POST['cname'];
	$comname=$_POST['comname'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$postcode=$_POST['postcode'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$remark=$_POST['remark'];
	$createdate=$_POST['createdate'];

	$guardday=$_POST['guardday'];
	$guardhour=$_POST['guardhour'];
	$guardmonth=$_POST['guardmonth'];
	$hour=$_POST['hour'];
	$day=$_POST['day'];
	$month=$_POST['month'];
	$requestdate=$_POST['requestdate'];


   
	
   $sql="insert into tblservices(ClientName,CompanyName,Address,City,State,Postcode,Phone,Email,RequestDate,CreateDate,Remark)values(:cname,:comname,:address,:city,:state,:postcode,:phone,:email,:requestdate,:createdate,:remark)";
   $query=$dbh->prepare($sql);
   $query->bindParam(':cname',$cname,PDO::PARAM_STR);
   $query->bindParam(':comname',$comname,PDO::PARAM_STR);
   $query->bindParam(':address',$address,PDO::PARAM_STR);
   $query->bindParam(':city',$city,PDO::PARAM_STR);
   $query->bindParam(':state',$state,PDO::PARAM_STR);
   $query->bindParam(':postcode',$postcode,PDO::PARAM_STR);
   $query->bindParam(':phone',$phone,PDO::PARAM_STR);
   $query->bindParam(':email',$email,PDO::PARAM_STR);
   $query->bindParam(':requestdate',$requestdate,PDO::PARAM_STR);
   $query->bindParam(':createdate',$createdate,PDO::PARAM_STR);
   $query->bindParam(':remark',$remark,PDO::PARAM_STR);
   $query->execute();

   $sql="insert into tblservicedetail(ServiceID,Guard_Day,Guard_Hour,Guard_Month,Hour,Day,Month)values(LAST_INSERT_ID(),:guardday,:guardhour,:guardmonth,:hour,:day,:month)";
   $query=$dbh->prepare($sql);

   $query->bindParam(':guardday',$guardday,PDO::PARAM_STR);
   $query->bindParam(':guardhour',$guardhour,PDO::PARAM_STR);
   $query->bindParam(':guardmonth',$guardmonth,PDO::PARAM_STR);
   $query->bindParam(':hour',$hour,PDO::PARAM_STR);
   $query->bindParam(':day',$day,PDO::PARAM_STR);
   $query->bindParam(':month',$month,PDO::PARAM_STR);
   $query->execute();
	echo '<script>alert("Request has been sent.")</script>';
   	echo "<script>document.location='service-request.php'</script>"; 

  }?>
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
<div class="form-group col-xs-1"> <label>ID</label> <input type="tel" name="comname" value="<?php  echo $row->client_id;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>Company Name</label> <input type="text" name="comname" value="<?php  echo $row->CompanyName;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>Contact Name</label> <input type="text" name="cname" value="<?php  echo $row->ContactName;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-2"> <label>Phone</label> <input type="text" name="phone"  value="<?php  echo $row->Workphnumber;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>Email</label> <input type="text" name="email"  value="<?php  echo $row->Email;?>" class="form-control" required='true' readonly> </div>
</div>

<div class="row">
<div class="form-group col-xs-3"> <label>Address</label> <input type="text" name="address"  value="<?php  echo $row->Address;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>City</label> <input type="text" name="city"  value="<?php  echo $row->City;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>PostCode</label> <input type="text" name="postcode"  value="<?php  echo $row->Postcode;?>" class="form-control" required='true' readonly> </div>
<div class="form-group col-xs-3"> <label>State</label> <input type="text" name="state"  value="<?php  echo $row->State;?>" class="form-control" required='true' readonly> </div>
</div> 
<?php $cnt=$cnt+1;}} ?>

<h3>Please fill-in your service request details</h3>
<div class="row">
<div class="form-group col-xs-3"> <label>Submit Date</label> <input type="text" name="createdate"  value="<?php date_default_timezone_set("Singapore"); echo date("Y/m/d");?>" class="form-control" required='true' readonly > </div>
<div class="form-group col-xs-3"> <label>Require Date</label> <input type="date" name="requestdate"  value="" class="form-control" required='true' > </div>
</div> 

<div class="form-group "> <label>Guard per hours:</label> 
<input type="text" name="guardhour"  value="" pattern="[0-9]+" style="width: 50px"> Guard
<input type="text" name="hour"  value="" pattern="[0-9]+"  style="width: 50px"> Hours
</div>
<div class="form-group "> <label>Guard per day:  </label> 
<input type="text" name="guardday"  value="" pattern="[0-9]+" style="width: 50px"> Guard
<input type="text" name="day"  value="" pattern="[0-9]+"  style="width: 50px"> Days
</div>
<div class="form-group "> <label>Guard per month:</label> 
<input type="text" name="guardmonth"  value="" pattern="[0-9]+" style="width: 50px"> Guard
<input type="text" name="month"  value="" pattern="[0-9]+"  style="width: 50px"> Month
</div>
<div class="row">
<div class="form-group col-xs-3"> <label>Remark</label> <input type="text" name="remark"  value="" class="form-control" > </div>
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