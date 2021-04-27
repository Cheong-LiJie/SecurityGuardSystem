<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || View Invoice </title>
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
							<li class="active">View Employee Profile</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
						
					
						<h3 class="inner-tittle two">Employee Details </h3>
<?php
$invid=intval($_GET['invoiceid']);
$sql="select distinct tblclient.ContactName,tblclient.CompanyName,tblclient.Workphnumber,tblclient.Email,tblclient.AccountID,tblinvoice.BillingId,tblinvoice.PostingDate, tblclient.Country, tblclient.Address,tblclient.Photo, tblclient.PassportNo from  tblclient   
	join tblinvoice on tblclient.ID=tblinvoice.Userid  where tblinvoice.BillingId=:invid";
$query = $dbh -> prepare($sql);
$query->bindParam(':invid',$invid,PDO::PARAM_STR);
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						<div class="graph">
							<div class="tables">
								
													<table class="table table-bordered" width="100%" border="1"> 
<tr>
<th colspan="8">Employee Details</th>	
</tr>
							 <tr> 
							 <th>Photo</th>
							 <td><img src="<?php echo ($row->Photo);?>" width="100" height="100"></td>
								<tr> <th>Full Name</th> 
								<td><?php  echo htmlentities($row->ContactName);?></td> </tr>
								<tr> <th>IC/Passport No.</th> 
								<td><?php  echo htmlentities($row->PassportNo);?></td> </tr>
								<tr><th>Contact no.</th>  
								<td><?php  echo htmlentities($row->Workphnumber);?></td></tr>
								<tr><th>Email </th> 
								<td><?php  echo htmlentities($row->Email);?></td></tr>
							</tr> 
							 <tr> 
								<th>Account ID</th> 
								<td><?php echo htmlentities($row->AccountID);?></td> </tr>
								<tr><th>Country</th> 
								<td colspan="6"><?php echo  htmlentities($row->Country);?></td> </tr>
								<tr><th>Address</th> 
								<td colspan="6"><?php echo  htmlentities($row->Address);?></td> </tr>
							</tr> 
							<tr>
<th style="text-align:center"><a href="service-control.php">Back</a></th>


</tr>
<?php $cnt=$cnt+1;}} ?>
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