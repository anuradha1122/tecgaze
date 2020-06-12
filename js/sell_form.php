<?php 
include("../database.php"); 
ob_start();
$database = new Database();


if(isset($_GET['p'])){
	$catagory = $_GET['p'];
}


?>
<span style="font-family: 'hgs4l',Arial, sans-serif;">
    
    <div class="col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0 text-center">
    	<form name="sellform" method="post" action="javascript:AnyFunction();">
    		<h5>Select Item</h5>
    		<?php 
	        $sql = "SELECT * FROM item WHERE catagory ='$catagory'";
			    $table_query = $database -> query($sql);
	        while ($sell_item = mysqli_fetch_assoc($table_query)) { ?>
	          	<div class="col-sm-6 col-xs-12 text-left" style="height: 30px;">
	            	<input type="radio" name="item" value="<?php $database -> display_message($sell_item['it_id']); ?>"><?php $database -> display_message($sell_item['name']); ?>
	          	</div>
			 <?php
	        }
	        ?>
	        <input type="text" name="seller_name">
    	</form>
    </div>
</span>

