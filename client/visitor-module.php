<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Customer Module </title>
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
							<li class="active">Visitor Module</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						<div class="graph">
							<div class="tables">
								<table id="data-table" class="table" border="1"> 
									<thead> 
    
                                <tr> 
                                    <th>No.</th> 
									<th>Name</th>
									<th>Date Visited</th>
									<th>Walk-In Time</th>
									<th>Walk-out Time</th> 
                                    <th>Total Visit Time</th>
									<th>Visited Location</th>
                                    <th>Visit Method</th>
									<th>Remarks</th>
                                    
                                    <th>Status</th>
                                    <th>View Profile</th>
									</tr>
									
									</thead>
									<tbody>
									<?php
									
$sql="select *, TIMESTAMPDIFF (MINUTE,walkinTime,walkoutTime) AS totalTime from tblvisitor";
$query = $dbh -> prepare($sql);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									     <tr class="active">
									      <th scope="row"><?php echo htmlentities($cnt);?></th>
									       <td><?php  echo htmlentities($row->visitorName);?></td>
									       <td><?php  echo htmlentities($row->visitorDate);?></td>
									       <td><?php  echo htmlentities($row->walkinTime);?></td>
									       <td><?php  echo htmlentities($row->walkoutTime);?></td>
										   <td><?php  echo htmlentities($row->totalTime);?> Minutes</td>
									       <td><?php  echo htmlentities($row->visitLocation);?></td>
									       <td><?php  echo htmlentities($row->visitMethod);?></td>
										   <td><?php  echo htmlentities($row->visitRemark);?></td>
									       <td><?php  echo htmlentities($row->visitStatus);?></td>
										  
									       <td><a href="view-visitor.php?visitorid=<?php echo $row->visitorID;?>">View</a></td>
									     </tr>
									     <?php $cnt=$cnt+1;}} ?>
									     </tbody> </table> 
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
	<?php include('../includes/js.php');?>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>