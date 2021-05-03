<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit'])){
 $aid=$_GET['assignid'];

echo '<script>alert("Service has been updated")</script>';
echo "<script>window.location.href ='service-assign.php'</script>";

  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Security Guard Management Sysytem|| Update Services</title>

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
<li class="active"">Update Services</li>
<div class="datebar" style="float: right;"><span  class = "label label-info"><i class="fa fa-calendar"></i></span> <?php echo date("F d, Y");?></div>
</ol>
</div>	

<!--client details-->

					<!--/sub-heard-part-->	
					<!--/forms-->
						
							<?php
$aid=$_GET['assignid'];
$sql="SELECT * from  tblclient where client_id=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
foreach($results as $row){               ?>

<h3>Client Details</h3>

<div class="row">
<div class="form-group col-xs-3"> <label>ID:</label> <span> <?php  echo $row->client_id;?></span> </div>
<div class="form-group col-xs-3"> <label>Company Name:</label><span> <?php  echo $row->CompanyName;?></span></div>
<div class="form-group col-xs-3"> <label>Phone:</label> <span><?php  echo $row->Workphnumber;?> </span></div>
<div class="form-group col-xs-3"> <label>Email:</label> <span><?php  echo $row->Email;?> </span></div>
</div>

<div class="row">
<div class="form-group col-xs-3"> <label>Address:</label>  <span><?php  echo $row->Address;?></span></div>
<div class="form-group col-xs-3"> <label>City:</label> <span><?php  echo $row->City;?></span> </div>
<div class="form-group col-xs-3"> <label>PostCode:</label><span> <?php  echo $row->Postcode;?> </span></div>
<div class="form-group col-xs-3"> <label>State:</label> <span><?php  echo $row->State;?> </span></div>
</div> 
<?php $cnt=$cnt+1;}} ?>
<div class="graph">
<div class="tables">
								<form method="post">
								<table class="table" border="1"> <thead> <tr> <th>#</th> 
									<th>Guard Name</th>
									 <th>Position</th> 
									 <th>Working Permit Due Date</th>
									 <th>Assign</th>
									  </tr>
									   </thead>
									    <tbody>
<?php
$sql="SELECT Name, Position, WorkingPermitDueDate  from tblaccount WHERE Status='Active'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
foreach($results as $row){               ?> 
<tr class="active">
    <th scope="row"><?php echo htmlentities($cnt);?></th>
     <td><?php  echo htmlentities($row->Name);?></td>
      <td><?php  echo htmlentities($row->Position);?></td>
       <td><?php  echo htmlentities($row->WorkingPermitDueDate);?></td> 
       
      <td><input type="checkbox" name="sids[]" value="" ></td>
   </tr>
   <?php $cnt=$cnt+1;}} ?>
   <tr>
<td colspan="5" align="center">
<button type="submit" name="submit" class="btn btn-default">Assign</button>	
<input type="button" class="btn btn-default" value="Back" onClick="history.back();return true;">	
</td>

</tr>
   </tbody> </table> 
   </form>
</div>

</div>

</div>
<!--//graph-visual-->
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