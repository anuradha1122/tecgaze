<?php
#page number 01
#declair database
include("../database.php");
ob_start();
$database = new Database();


$ca_id = $_GET['q'];
?>

<h5>Product Name භාණ්ඩයේ නම</h5>
<select name="item" style="width: 100%">
	<?php
    $i=0;
    $sql = "SELECT * FROM item WHERE catagory = '$ca_id' ORDER BY catagory";
		$item_query = $database ->query($sql);
      while($item = mysqli_fetch_assoc($item_query)){ ?> 
      	<option value="<?php echo $item['it_id']; ?>"><?php echo $item['name']." (".$item['name_si'].")"; ?>    
      <?php }
    ?>
</select>
<h5>Product Specific Name භාණ්ඩයේ විශේෂිත නම (ඇත්නම් පමණක්) (උදා - අඹ-විලාඩ් , වී - කීරි සම්බා)</h5>
<input type="text" name="specific" style="width: 100%">
<h5>Seller Name (විකුණුම්කරුගේ නම)</h5>
<input type="text" name="sname" style="width: 100%" required>
<h5>Quantity (ප්‍රමාණය)</h5>
<input type="number" name="amount" style="width: 100%" min="1" Max="99999999" required>
<h5>Unit Price (එකක මිල - කිලෝ වලින් හෝ ද්‍රව්‍ය වලින් )</h5>
<input type="number" name="price" style="width: 100%" min="1" Max="9999999999" required>
<input type="checkbox" name="organic">Organic (කාබනික)<br>
<input type="checkbox" name="nego">Price can be Negotiable (මුදල කතාබහ කරගත හැක)
<h5>Telephone (දුරකථන)</h5>
<input type="text" name="tel" style="width: 100%" required>
<h5>Actual Image (ද්‍රව්‍යයේ සත්‍ය චායාරුපයක්)</h5>
<input type="file" name="image" >
<h5>E-mail - Optional (විද්‍යුත් ලිපිනය - තිබේනම් පමණක්)</h5>
<input type="text" name="email" style="width: 100%">
<span id="img"></span>
<h5>District (දිස්ත්‍රික්කය)</h5>
<select name="district" style="width: 100%">
	<?php
    $i=0;
    $district_query = $database -> table_search('district');
      while($district = mysqli_fetch_assoc($district_query)){ ?> 
      	<option value="<?php echo $district['dt_id']; ?>"><?php echo $district['name']; ?>    
      <?php }
    ?>
</select>

<h5>City-Optional නගරය -අත්‍යවශ්‍ය නැත</h5>
<input type="text" name="city" style="width: 100%">

<input type="submit" class="btn btn-primary" name="submit" style="margin-top: 20px;">