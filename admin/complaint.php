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
	<title>Feedback</title>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Closed Complaints</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

	
	<script language="javascript" type="text/javascript">
		var popUpWin=0;
		function popUpWindow(URLStr, left, top, width, height){
		 if(popUpWin){
			if(!popUpWin.closed) popUpWin.close();
			}
		 popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>

</head> 
<body style="background-image: url('images/bg.jpg');background-size:100% 100vh;">
<?php include_once('includes/sidebar.php');?>
	<div class="page-container">
		<div class="left-content">
			<div class="inner-content">
				<?php include_once('includes/header.php');?>
				<div class="outter-wp">
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active" style="color:#fff;">Feedback</li>
						</ol>
					</div>
					<div class="graph-visual tables-main">					
						<div class="graph">
							
								<table id="data-table" class="table" border="1" > 
									<thead> 
										<tr> 
											<th>#</th>
                            			    <th>Complaint No</th>
											<th>Contact Name</th>
											<th>Complany Name</th>
											<th>Issue</th>
											<th>Status</th>
											<th>Submitted Date</th>							
											<th>Action</th>
										</tr>
									</thead>
								<tbody>
									<?php
	$uid=$_SESSION['clientmsaid'];
	$sql="select * from tblclient   
	join tblcomplaints on tblclient.ID=tblcomplaints.accountId";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0){
	foreach($results as $row){  
              ?>
			<tr class='active'>
				<th scope="row"><?php echo htmlentities($cnt);?></th>
				<td><?php  echo htmlentities($row->complaintID);?></td>
				<td><?php  echo htmlentities($row->ContactName);?></td>
				<td><?php  echo htmlentities($row->CompanyName);?></td>	
				<td><?php  echo htmlentities($row->issue);?></td>
				<?php
					if (($row->status)==9){
					echo "<td><button type='button' class='btn btn-warning' style='width: 100%; font-size:12px;margin:auto;'>In process</button></td>";
					}else if (($row->status)==8){
						echo "<td><button type='button' class='btn btn-success' style='width: 100%; font-size:12px;margin:auto;'>Closed</button></td>";
					} else if (($row->status)==10){
						echo "<td><button type='button' class='btn btn-danger' style='width: 100%; font-size:12px;margin:auto;'>Not process yet</button></td>";
					}else{
						echo "<td><button type='button' class='btn btn-danger' style='width: 100%; font-size:12px; margin:auto;'>Error</button></td>";
					} 
				?>
				<td><?php  echo htmlentities($row->submit_Date);?></td>			
				<td><a href="view-complaint.php?complaintID=<?php  echo $row->complaintID;?>">View</a></td>
			</tr>
			<?php $cnt=$cnt+1;}} ?>
			</tr>
								</tbody> </table> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="clearfix"></div>		
	</div>
    <?php include('../includes/js.php');?>  
    <script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php }  ?>