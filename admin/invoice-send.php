<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{{

      
    ?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Invoice </title>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->

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
<body>
<div class="container content-invoice">
<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
<div class="load-animate animated fadeInUp">
<div class="row">
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
<h3>Invoice</h3>
</div>
</div>
<input id="currency" type="hidden" value="$">
    <div class="row">

    <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
        <h3>From,</h3>
            ABC Guard Sbd. Bhd.<br>
            A-5-7,Metro Condominium,53300,Kuala Lumpur<br>
            +60-1123 5678<br>
            service@abcguard.com<br>
    </div>

    <?php
$serid=$_GET['serviceid'];
$sql="SELECT * from  tblservices WHERE ServiceID=:serid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
foreach($results as $row){               
    ?>
    <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
        <h3>To,</h3>
            <?php  echo $row->CompanyName;?><br>
            <?php  echo $row->Address;?>,<?php  echo $row->City;?>,<?php  echo $row->Postcode;?>,<?php  echo $row->State;?><br>
            <?php  echo $row->Phone;?><br>
            <?php  echo $row->Email;?><br>          
    </div>
    

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
            
            Invoice ID:<?php  echo $row->Phone;?><br>
            Date: <?php date_default_timezone_set("Singapore"); echo date("Y/m/d");?><br>
     </div>
    
</div>
</div>
<?php }} ?>

<!--Table-->
<?php
$serid=$_GET['serviceid'];
$sql="SELECT *,Hour_Price+Day_Price+Month_Price AS SubTotal 
    From(
        Select *,
            Guard_Hour*Hour*80 AS Hour_Price,
            Guard_Day*Day*2000 AS Day_Price,
            Guard_Month*Month*60000 AS Month_Price
        from  tblservicedetail WHERE ServiceID=:serid) t ";
$query = $dbh -> prepare($sql);
$query->bindParam(':serid',$serid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){
foreach($results as $row){               
    ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <table id="data-table"class="table table-bordered table-hover" id="invoiceItem" width="100%" >
    <tr>
        <th width="2%">#</th>
        <th width="15%">Item Name</th>
        <th width="5%">Quatity</th>
        <th width="5%">Frequency</th>
        <th width="15%">Price(RM)</th>
        <th width="10%">Total(RM)</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Guard per hour</td>
        <td><?php  echo $row->Guard_Hour;?> Guards</td>
        <td><?php  echo $row->Hour;?> Hours</td>
        <td>RM80 Per hour</td>
        <td style="text-align:right;"><?php  echo $row->Hour_Price;?></td>
    </tr>
        <td>2</td>
        <td>Guard per day</td>
        <td><?php  echo $row->Guard_Day;?> Guards</td>
        <td><?php  echo $row->Day;?> Day</td>
        <td>RM2000 Per day</td>
        <td style="text-align:right;"><?php  echo $row->Day_Price;?></td>
    <tr>
        <td>3</td>
        <td>Guard per month</td>
        <td><?php  echo $row->Guard_Month;?> Guards</td>
        <td><?php  echo $row->Month;?> Months</td>
        <td>RM60000 Per month</td>
        <td style="text-align:right;"><?php  echo $row->Month_Price;?></td>
    </tr>
    <tr>
</table>
</div>
</div>
    
    <?php }} ?>
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
<h3>Notes: </h3>
    <div class="form-group">
        <textarea class="form-control txt" rows="2" name="notes" id="notes" placeholder="Your Notes"></textarea>
    </div>
<br>
    <div class="form-group">
        <!--<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">-->
        <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
    </div>
    </div>


    <div  class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
    <span class="form-inline">
    <div class="form-group">
        <label>Subtotal:  </label>
            <div class="input-group">
            <div >RM <?php  echo $row->SubTotal;?></div>
                
    </div>
    </div>

<div class="form-group">
        <label>Tax Rate:  </label>
            <div class="input-group">
            
        <div>5%</div>
        </div>
</div>

<div class="form-group">
        <label>Total:  </label>
            <div class="input-group">
            <div style="font-weight: bold;font-size:larger">RM <?php  echo $row->SubTotal+($row->SubTotal*5/100);?></div>
       
        </div>
</div>

        </div>
    </div>
</div>

</form>
</div>
</body>
</html>
<?php }} ?>