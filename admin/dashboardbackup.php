<div class="outter-wp">
				<!--custom-widgets-->
				<div class="custom-widgets">
					<div class="row-one">
						<div class="col-md-4 widget">
							<div class="stats-left ">
								<?php 
$sql ="SELECT client_id from tblclient ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$tclients=$query->rowCount();
?>
								<h5>Total</h5>
								<h4> Clients</h4>
							</div>
							<div class="stats-right">
								<label><?php echo htmlentities($tclients);?></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						<div class="col-md-4 widget states-mdl">
							<div class="stats-left">
							<?php 
$sql1 ="SELECT serviceID from tblservices ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$tser=$query1->rowCount();
?>	
								<h5>Total</h5>
								<h4>Services</h4>
							</div>
							<div class="stats-right">
								<label> <?php echo htmlentities($tser);?></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						
						<div class="col-md-4 widget">
							<div class="stats-left">
								<?php
$sql6="select  sum(tblservices.ServicePrice) as todaysale
 from tblinvoice 
  join tblservices  on tblservices.serviceID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()";

  $query6 = $dbh -> prepare($sql6);
  $query6->execute();
  $results6=$query6->fetchAll(PDO::FETCH_OBJ);
  foreach($results6 as $row6)
{

$todays_sale=$row6->todaysale;
}


  ?>
								<h5>Today</h5>
								<h4>Sales($)</h4>
							</div>
							<div class="stats-right">
								<label><?php echo $todays_sale;?></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						<div class="clearfix"> </div>	
					</div>
				</div>
						</div>
						<div class="outter-wp">
				<!--custom-widgets-->
				<div class="custom-widgets">
					<div class="row-one">
					
						<div class="col-md-4 widget states-mdl">
							<div class="stats-left">
								<?php
$sql7="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.serviceID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()-1;";

  $query7 = $dbh -> prepare($sql7);
  $query7->execute();
  $results7=$query7->fetchAll(PDO::FETCH_OBJ);
  foreach($results7 as $row7)
{

$yest_sale=$row7->totalcost;
}


  ?>
								<h5>Yesterday</h5>
								<h4>Sales($)</h4>
							</div>
							<div class="stats-right">
								<label> <?php echo $yest_sale;?></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						<div class="col-md-4 widget states-thrd">
							<div class="stats-left">
								<?php
$sql8="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.serviceID=tblinvoice.ServiceId where date(PostingDate)>=(DATE(NOW()) - INTERVAL 7 DAY);";

  $query8 = $dbh -> prepare($sql8);
  $query8->execute();
  $results8=$query8->fetchAll(PDO::FETCH_OBJ);
  foreach($results8 as $row8)
{

$sevendays_sale=$row8->totalcost;
}


  ?>

								<h5>Last Sevendays</h5>
								<h4>Sale($)</h4>
							</div>
							<div class="stats-right">
								<label><?php echo $sevendays_sale;?></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						<div class="col-md-4 widget states-last">
							<div class="stats-left">
								<?php
$sql9="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.serviceID=tblinvoice.ServiceId";

  $query9 = $dbh -> prepare($sql9);
  $query9->execute();
  $results9=$query9->fetchAll(PDO::FETCH_OBJ);
  foreach($results9 as $row9)
{

$total_sale=$row9->totalcost;
}


  ?>
								<h5>Total</h5>
								<h4>Sales($)</h4>
							</div>
							<div class="stats-right">
								<label><?php echo $total_sale;?></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						<div class="clearfix"> </div>	
					</div>
				</div>
						</div>
		