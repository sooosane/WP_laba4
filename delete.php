<?php
$products = simplexml_load_file('data/database.xml');

if(isset($_POST['submitDelete'])) {
	$products = simplexml_load_file('data/database.xml');

  foreach($products->product as $product){
		if($product['id']==$_POST['id']){
			unset($product[0]);
			break;
		}
	}
	file_put_contents('data/database.xml', $products->asXML());
	header('location:index.php');
}

foreach($products->product as $product){
	if($product['id']==$_GET['id']){
		$id = $product['id'];
		$name = $product->name;
		$price = $product->price;
    $image = $product->image;
		break;
	}
}

?>
<form method="post">
	<table cellpadding="2" cellspacing="2">
		<tr>
			<td>Id</td>
			<td><input type="text" name="id" value=<?php echo $id; ?> readonly="readonly"></td>
		</tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="Delete" name="submitDelete"></td>
		</tr>
	</table>
</form>
