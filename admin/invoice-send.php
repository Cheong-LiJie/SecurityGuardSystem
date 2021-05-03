<?php
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    {

 


    

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
$sql="SELECT * from  tblservices where ServiceID=:serid";
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
            <?php  echo $row->Address;?>,<?php  echo $row->City;?>,<?php  echo $row->Postcode;?><?php  echo $row->State;?><br>
            <?php  echo $row->Phone;?><br>
            <?php  echo $row->Email;?><br>          
    </div>
    

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
            
            Invoice ID:<?php  echo $row->Phone;?><br>
            Date: <?php date_default_timezone_set("Singapore"); echo date("Y/m/d");?><br>
     </div>
     <?php }} ?>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
        <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
        <th width="15%">Item No</th>
        <th width="38%">Item Name</th>
        <th width="15%">Quantity</th>
        <th width="15%">Price</th>
        <th width="15%">Total</th>
    </tr>
    <tr>
        <td><input class="itemRow" type="checkbox"></td>
        <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
        <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
        <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
        <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
        <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
    </tr>
</table>
</div>
</div>
    <div class="row">
    <div >
        <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
        <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
    </div>
    </div>

    <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
<h3>Notes: </h3>
    <div class="form-group">
        <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
    </div>
<br>
    <div class="form-group">
        <!--<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">-->
        <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
    </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <span class="form-inline">
    <div class="form-group">
        <label>Subtotal:  </label>
            <div class="input-group">
            <div class="input-group-addon currency">RM</div>
                <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
    </div>
    </div>

<div class="form-group">
<label>Tax Rate:  </label>
<div class="input-group">
<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
<div class="input-group-addon">%</div>
</div>
</div>

<div class="form-group">
<label>Total:  </label>
<div class="input-group">
<div class="input-group-addon currency">RM</div>
<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
</div>
</div>

</div>
</span>
</div>
</div>

</div>
</form>
</div>
<?php }}  ?>