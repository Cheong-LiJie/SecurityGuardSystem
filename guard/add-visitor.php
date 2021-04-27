<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
	if(isset($_POST['submit']))
	{
		$visitorName =$_POST['visitorName'];
		$visitorIC = $_POST['visitorIC'];
		$visitorPhone = $_POST['visitorPhone'];
		$visitorDate = $_POST['visitorDate'];	
		$visitLocation = $_POST['visitLocation'];
		$walkinTime = $_POST['walkinTime'];
		$walkoutTime = $_POST['walkoutTime'];
		$totalTime = $_POST['totalTime'];
		$visitMethod = $_POST['visitMethod'];
		$visitRemark = $_POST['visitRemark'];
		$visitStatus= $_POST['visitStatus'];

		$sql = "insert into tblvisitor(visitorName,visitorIC,visitorPhone,visitorDate,visitLocation,walkinTime,walkoutTime,totalTime,visitMethod,visitRemark,visitStatus )values
		(:visitorName,:visitorIC,:visitorPhone,:visitorDate,:visitLocation,:walkinTime,:walkoutTime,:totalTime,:visitMethod,:visitRemark,:visitStatus)";
		   $query = $dbh -> prepare($sql);
$query->bindParam(':visitorName',$visitorName,PDO::PARAM_STR);
$query->bindParam(':visitorIC',$visitorIC,PDO::PARAM_STR);
$query->bindParam(':visitorPhone',$visitorPhone,PDO::PARAM_STR);
$query->bindParam(':visitorDate',$visitorDate,PDO::PARAM_STR);
$query->bindParam(':visitLocation',$visitLocation,PDO::PARAM_STR);
$query->bindParam(':walkinTime',$walkinTime,PDO::PARAM_STR);
$query->bindParam(':walkoutTime',$walkoutTime,PDO::PARAM_STR);
$query->bindParam(':totalTime',$totalTime,PDO::PARAM_STR);
$query->bindParam(':visitMethod',$visitMethod,PDO::PARAM_STR);
$query->bindParam(':visitRemark',$visitRemark,PDO::PARAM_STR);
$query->bindParam(':visitStatus',$visitStatus,PDO::PARAM_STR);
		   $query->execute();
		   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Visitor has been added.")</script>';
echo "<script>window.location.href ='add-visitor.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
		
	}
	
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Add Visitor </title>
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
							<li class="active"><a href="customer-module.php">Customer Module</a></li>
							<li class="active">Add Visitor Profile</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
						
					
						<h3 class="inner-tittle two">Add Visitor Profile </h3>

<table class="table table-bordered" width="100%" border="1"> 
<tr>
<th colspan="11" style="text-align:center">Add Visitor Profile</th>	
</tr>
							    <tr> <th>Name:</th>
								<form method="post" action=""> 
								
							    <td><input type="text" name="visitorName" placeholder="Enter Name" required /></td></tr>
								<tr> <th>IC:</th> 
								<td><input type="text" name="visitorIC" placeholder="Enter IC" required /></td> </tr>
								<tr> <th>Phone Num:</th> 
								<td><input type="text" name="visitorPhone" placeholder="Enter Phone Number" required /></td> </tr>
								<tr> <th>Date Visited:</th>
							    <td><input type="text" name="visitorDate" placeholder="Enter Visit Date" required /></td></tr>
								<tr> <th>Visit Location:</th>
							    <td><input type="text" name="visitLocation" placeholder="Enter Visit Location" required /></td></tr>
								<tr> <th>Walk-In:</th> 
								<td><input type="text" name="walkinTime" placeholder="Enter Walk-In Time" required /></td> </tr>
								<tr> <th>Walk-Out:</th> 
								<td><input type="text" name="walkoutTime" placeholder="Enter Walk-Out Time"/></td> </tr>
                                <tr> <th>Total Time:</th>
							    <td><input type="text" name="totalTime" placeholder="Enter Total Visit Time"/></td></tr>
								<tr> <th>Visit Method:</th> 
								<td><input type="text" name="visitMethod" placeholder ="Enter Visit Method" required /></td> </tr>
								<tr> <th>Remarks:</th> 
								<td><input type="text" name="visitRemark" placeholder="Enter Remarks" required /></td> </tr>
                                <tr> <th>Status:</th>
							    <td><input type="text" name="visitStatus" placeholder="Enter Status" required /></td></tr>
                                <tr> <th></th> 
                                <td><input name="submit" type="submit" value="Add"/></td></tr>
								</form>
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
	<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
<?php }  ?>