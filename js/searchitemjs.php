<?php 
include("../database.php"); 
ob_start();
$database = new Database();


if(isset($_GET['q'])){
	$item = $_GET['q'];
}


?>
<span style="font-family: 'hgs4l',Arial, sans-serif;">
    
    <div class="col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0 text-center">
    	<form name="sellform" method="post" action="javascript:AnyFunction();">
    		<?php 
	        $sql = "SELECT * FROM item WHERE name LIKE '%$item%' OR name_si LIKE '%$item%' LIMIT 5";
			    $table_query = $database -> query($sql);
	        while ($sell_item = mysqli_fetch_assoc($table_query)) { ?>
	          	<div class="col-xs-12 text-left" style="height: 30px;">
	            	<?php $database -> display_message($sell_item['name']." / ".$sell_item['name_si']); ?>
	            	<?php echo " "." ("; ?>
	            	<a href="sell.php?item=<?php echo $sell_item['it_id']; ?>"> SELL / </a><a href="buy.php?item=<?php echo $sell_item['it_id']; ?>"> BUY </a>
	            	<?php echo " "." )"; ?>
	          	</div>
			 <?php
	        }
	        ?>
    	</form>
    </div>
</span>

