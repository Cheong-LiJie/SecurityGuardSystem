<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
	  
  	?>
<!DOCTYPE HTML>
<html>
<head>

	<title>Security Guard Management System|| Manage Guard </title>
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
							<li class="active" style="color:white;">Manage Guard</li>
							<div class="datebar" style="float: right;color:white; "><span  class = "label label-info"><i class="fa fa-calendar"></i></span> <?php echo date("F d, Y");?></div>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">

						<div class="graph">
							<div class="tables">
							<div id="data-table_length" class="dataTables_length">
							<!--<label>Show <select size="1" name="data-table_length" aria-controls="data-table">
							<option value="10" selected="selected">10</option>
							<option value="25">25</option><option value="50">50</option>
							<option value="100">100</option>
							</select> entries</label></div>

							<div class="dataTables_filter" id="data-table_filter"><label>Search: <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for ID"></label></div>
							-->	
							<table id="data-table"class="table" border="1"> 
							<a style="float: right;" name="add" id="add" class="btn btn-primary" href="add-account.php" role="button">Add Guard</a>
							<thead> <tr> <th>#</th> 
									<th>ID</th>
                                    <th>Picture</th>
									 <th>Name</th> 
									 <th>Phone</th>
									 <th>Position</th>
									 <th>Nationality</th>
									 <th>Working Permit Date</th>
									 <th>Status</th>
									  <th>Action</th>
                                      </tr>
									  
									   </thead>
									    <tbody>

<?php
$sql="SELECT * from tblaccount";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               
?>



									     <tr class="active">
									      <th scope="row"><?php echo htmlentities($cnt);?></th>
									       <td><?php  echo htmlentities($row->AccountID);?></td>
                                           <td><img style="height:60px;width:60px" src="http://localhost/SecurityGuardSystem/admin/images/<?php echo ($row->Picture);?>"></td>
									         <td><?php  echo htmlentities($row->Name);?></td> 
									         <td><?php  echo htmlentities($row->Phone);?></td>
                                             <td><?php  echo htmlentities($row->Position);?></td>
									         <td><?php  echo htmlentities($row->Nationality);?></td>
                                             <td><?php  echo htmlentities($row->WorkingPermitDueDate);?></td>
											 <td><?php  echo htmlentities($row->Status);?></td>
									        <td><a href="account-view.php?editid=<?php echo $row->AccountID;?>">View||</a><a href="account-update.php?editid=<?php echo $row->AccountID;?>">Edit</a></td>
											
									     </tr>
									     <?php $cnt=$cnt+1;}} ?>
									     </tbody> </table> 
							</div>

						</div>
				
					</div>
					<!--//graph-visual-->
				</div>
				</div>
				<!--//outer-wp-->
				<?php include_once('includes/footer.php');?>
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include_once('includes/sidebar.php');?>
	
	</div>
	
	<!--js -->
	<?php include('../includes/js.php');?>  
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>


</body>
</html>
<?php }?>