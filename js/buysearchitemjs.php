<?php

include("../database.php"); 
ob_start();
$database = new Database();


if(isset($_GET['q'])){
	$item = $_GET['q'];
}

if(isset($_GET['p'])){
	$catagory = $_GET['p'];
}

if(isset($_GET['s'])){
	$district = $_GET['s'];
}

if(isset($_GET['t'])){
	$district2 = $_GET['t'];
}

if(isset($_GET['u'])){
	$catagory2 = $_GET['u'];
}
$lim =  $_SESSION['lim'];
$i=0;
$sql = "SELECT * FROM item JOIN sell_item ON item.it_id = sell_item.it_id JOIN seller ON sell_item.se_id = seller.se_id WHERE sell_item.confirm = '0' AND (item.name LIKE '%$item%' OR item.name_si LIKE '%$item%' OR sell_item.special_name LIKE '%$item%') AND (item.catagory = $catagory OR $catagory = 0) AND (item.catagory = $catagory2 OR $catagory2 = 0) AND (seller.district = $district OR $district = 0) AND (seller.district = $district2 OR $district2 = 0)";
$buy_item_query = $database ->query($sql);
while($buy_item = mysqli_fetch_assoc($buy_item_query)){
	$i++;
}
$pages = $i/10+1;
$page = intval($pages);
$sql = "SELECT * FROM item JOIN sell_item ON item.it_id = sell_item.it_id JOIN seller ON sell_item.se_id = seller.se_id WHERE sell_item.confirm = '0' AND (item.name LIKE '%$item%' OR item.name_si LIKE '%$item%' OR sell_item.special_name LIKE '%$item%') AND (item.catagory = $catagory OR $catagory = 0) AND (item.catagory = $catagory2 OR $catagory2 = 0) AND (seller.district = $district OR $district = 0)AND (seller.district = $district2 OR $district2 = 0) ORDER BY sell_item.add_date DESC LIMIT $lim, 10";
$buy_item_query = $database ->query($sql);
while($buy_item = mysqli_fetch_assoc($buy_item_query)){
	?>
    <div class="col-xs-12 text-center img-thumbnail">
    	<?php
    	$item = $database->table_by_id($buy_item['it_id'],'item','it_id');
    	$seller = $database->table_by_id($buy_item['se_id'],'seller','se_id');
    	$district = $database->table_by_id($seller['district'],'district','dt_id');

    	//$image = $item['image'];
    	$img = '../'.$buy_item['image'];
    	if(file_exists($img)){
    		$image = $buy_item['image'];
    	}
    	if(!file_exists($img) OR $buy_item['image']==""){
    		$image = $item['image'];
    	}
    	?>
    <div class="col-sm-4 col-xs-12 text-center img-thumbnail">
    	<img src="<?php echo $image; ?>" style="width: 100%;height: 100px;object-fit: cover;">
    </div>
    <div class="col-sm-8 col-xs-12 text-center">
    	<h4 class="hgs4b"><?php echo $item['name']." (".$item['name_si'].")"; ?></h4>
		<h4 class="hgs4b"><?php if($seller['tel']==""){ }else{?><span style="color: green;"><?php echo $seller['tel'];?></span><?php } ?></h4>
		<h4 class="hgs4"><?php echo $district['name']; if($seller['city']==""){ }else{ echo " -".$seller['city']; }?></h4>
    </div>
	
	
	<div class="col-xs-12 text-left">
		<h5><?php if($buy_item['special_name']==""){ }else{?><span>Special Name (විශේෂිත නම) :</span><span style="color: green;"><?php echo $buy_item['special_name'];?></span><?php } ?></h5>
		<h5>Quantity (ප්‍රමාණය) :<?php if($buy_item['amount']==""){ echo "NO";}else{?><span style="color: green;"><?php echo $buy_item['amount'];?></span><?php } ?></h5>
		<h5>Unit Price (එකක මිල - කිලෝ වලින් හෝ ද්‍රව්‍ය වලින් ) :<?php if($buy_item['price']==""){ echo "NO";}else{?><span style="color: green;"><?php echo $buy_item['price'];?></span><?php } ?></h5>
		<h5>Seller Name (විකුණුම්කරුගේ නම) :<?php if($seller['sname']==""){ echo "NO";}else{?><span style="color: green;"><?php echo $seller['sname'];?></span><?php } ?></h5>
		<h5><?php if($buy_item['nego']==0){ echo "Final Price"; }else{?><span style="color: green;"><?php echo "Price is Negotiable";?></span><?php } ?><span>/</span>
		<?php if($buy_item['organic']==0){ echo "Non-organic"; }else{?><span style="color: green;"><?php echo "Organic";?></span><?php } ?></h5>
		<h5><?php if($seller['email']==""){ }else{?><span>E-mail (විද්‍යුත් ලිපිනය) :</span><span style="color: green;"><?php echo $seller['email'];?></span><?php } ?></h5>
	</div>

</div>
<?php
}
?>