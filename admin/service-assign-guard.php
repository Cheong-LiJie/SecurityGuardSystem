<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
 $aid=$_GET['assignid'];
 $sstatus=$_GET['sstatus'];
echo '<script>alert("Service (has been updated")</script>';
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
<li class="active">Update Services</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
                    <h3 class="inner-tittle two"> Assign Services</h3>
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
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> <tr class="active">
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