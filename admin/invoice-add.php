<?php
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Invoice </title>
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
	<!-- /js -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
</head> 
<body style="background-image: url('http://localhost/SecurityGuardSystem/admin/images/bg.jpg');">
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
							<li class="active"style="color:white;">Invoice</li>
							<div class="datebar" style="float: right;color:white;"><span  class = "label label-info"><i class="fa fa-calendar"></i></span> <?php echo date("F d, Y");?></div>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						<div class="graph">
							<div class="tables">
								<table class="table" border="1"> <thead> <tr> <th>#</th> 
									<th>Service ID</th>
									<th>Company Name</th>
									 <th>Create Date</th> 
									 <th>Address</th>
                                     <th>City</th>
									 <th>Action</th>
									  </tr>
									   </thead>
									    <tbody>
									    	
<?php
 $sql="select * from tblservices ";
 $query = $dbh -> prepare($sql);
 $query->execute();
 $results=$query->fetchAll(PDO::FETCH_OBJ);
 $cnt=1;
 if($query->rowCount() > 0){
 foreach($results as $row){               
?>
						<tr class="active">
							<th scope="row"><?php echo htmlentities($cnt);?></th>
							<td><?php  echo htmlentities($row->ServiceID);?></td>
							<td><?php  echo htmlentities($row->CompanyName);?></td>
							<td><?php  echo htmlentities($row->CreateDate);?></td>
                            <td><?php  echo htmlentities($row->Address);?></td>
							<td><?php  echo htmlentities($row->City);?></td>       
							<td><a target="_blank" href="invoice-send.php?serviceid=<?php  echo $row->ServiceID;?>">Add</a></td>
						</tr>
		                <?php $cnt=$cnt+1;}} ?>
			            </tbody> 
                    </table> 
				</div>
			</div>
		</div>
					<!--//graph-visual-->
	</div>
				<!--//outer-wp-->
				<?php include_once('includes/footer.php');?>
	</div>
	</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
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