<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Manage Client </title>
	
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
							<li class="active">Manage Clients</li>
							<div class="datebar"style="float: right;color:white;"><span  class = "label label-info"><i class="fa fa-calendar"></i></span> <?php echo date("F d, Y");?></div>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
					
						<div class="graph">
							<div class="tables" >
							<!--<label>Show <select size="1" name="data-table_length" aria-controls="data-table">
							<option value="10" selected="selected">10</option>
							<option value="25">25</option><option value="50">50</option>
							<option value="100">100</option>
							</select> entries</label></div>

							<div class="dataTables_filter" id="data-table_filter"><label>Search: <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for ID"></label></div>
							-->	
								<table id="data-table" class="table"   border="1"> 
								<a style="float: right;" name="add" id="add" class="btn btn-primary" href="add-client.php" role="button">Add client</a>
								<thead> <tr id="column"> <th>#</th> 
									<th>Client ID</th>
									 <th>Contact Name</th>
									 <th>Company Name</th>
									 <th>Mobile Number</th>
									 <th>State</th>
									 <th>Status</th>
									 <th>Setting</th>
									  </tr>
									   </thead>
									    <tbody>
									    	<?php
$sql="SELECT * from tblclient";
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
									       <td><?php  echo htmlentities($row->client_id);?></td>
									        <td><?php  echo htmlentities($row->ContactName);?></td>
									         <td><?php  echo htmlentities($row->CompanyName);?></td> 
									         <td><?php  echo htmlentities($row->Workphnumber);?></td>
									         <td><?php  echo htmlentities($row->State);?></td>
											 <td><?php  echo htmlentities($row->Status);?></td>
									        <td><a href="edit-client-details.php?editid=<?php echo $row->client_id;?>">Edit</a></td>
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
		
	</div>
	</div>
<!--js -->
<?php include('../includes/js.php');?>  
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>


	<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("data-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</body>
</html>
<?php }  ?>