<?php
	if(!empty($_POST["save"])) {
	   // $conn = mysqli_connect("localhost","root","test", "blog_samples");
		echo $itemCount = count($_POST["item_name"]); exit();
		$itemValues=0;
		$query = "INSERT INTO item (item_name,item_price) VALUES ";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["item_name"][$i]) || !empty($_POST["item_price"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["item_name"][$i] . "', '" . $_POST["item_price"][$i] . "')";
			}
		}
		$sql = $query.$queryValue;
		if($itemValues!=0) {
		    $result = mysqli_query($conn, $sql);
			if(!empty($result)) $message = "Added Successfully.";
		}
	}
?>
<HTML>
<HEAD>
<TITLE>PHP jQuery Dynamic Textbox</TITLE>
<LINK href="style.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<SCRIPT>
function addMore() {
	$("<DIV>").load("input.php", function() {
			$("#product").append($(this).html());
	});	
}
function deleteRow() {
	$('DIV.product-item').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
</SCRIPT>
</HEAD>
<BODY>
<FORM name="frmProduct" method="post" action="">
<DIV id="outer">
<DIV id="header">
<DIV class="float-left">&nbsp;</DIV>
<DIV class="float-left col-heading">Item Name</DIV>
<DIV class="float-left col-heading">Item Price</DIV>
</DIV>
<DIV id="product">
<?php require_once("input.php") ?>
</DIV>
<DIV class="btn-action float-clear">
<input type="button" name="add_item" value="Add More" onClick="addMore();" />
<input type="button" name="del_item" value="Delete" onClick="deleteRow();" />
<span class="success"><?php if(isset($message)) { echo $message; }?></span>
</DIV>
<DIV class="footer">
<input type="submit" name="save" value="Save" />
</DIV>
</DIV>
</form>
</BODY>
</HTML>