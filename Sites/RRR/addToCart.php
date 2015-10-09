<?php
session_start();

include 'DBconnect.php';
//////////////////////////////////////////////////////////////////////////////////////////
/// Add from product page to cart
//////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) {
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	header("location: ShoppingCart.php");
    exit();
}
?>
<?php
//////////////////////////////////////////////////////////////////////////////////////////
///	Remove Single Item from Cart
//////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
	header("location: ShoppingCart.php");
    exit();
}
?>
<?php
//////////////////////////////////////////////////////////////////////////////////////////
///	Empty Shopping Cart
//////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>
<?php
//////////////////////////////////////////////////////////////////////////////////////////
///	Display Cart & Products in it
//////////////////////////////////////////////////////////////////////////////////////////

$cartOutput = "";
$cartTotal = "";
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
	$cartOutput =
		"<tr class='spaceUnder'><td colspan='5'></td></tr>
		<tr class='productitm'>
			<td colspan='5'><h1>Your Cart is empty!!</h1></td>
		</tr>
		<tr class='spaceUnder'><td colspan='5'></td></tr>";
}else{
	$i = 0;
	foreach($_SESSION['cart_array'] AS $each_item){
		$i++;
		$item_id = $each_item['item_id'];
		$quantity = $each_item['quantity'];
		$sql = mysql_query(
		"SELECT PRODUCT.PRODUCT_ID, PRODUCT.TYPE, PRICE, ALBUM_NAME, ARTIST_NAME, ALBUM_IMG
		FROM PRODUCT
		JOIN ALBUM_RELEASE
		ON PRODUCT.PRODUCT_ID = ALBUM_RELEASE.ALBUM_PRODUCT_ID
		JOIN ALBUM
		ON ALBUM.ALBUM_ID = ALBUM_RELEASE.ALBUM_ID
		JOIN ARTIST
		ON ARTIST.ARTIST_ID = ALBUM.ARTIST_ID
		WHERE PRODUCT_ID='".$item_id."' LIMIT 1");
		while ($cartrow = mysql_fetch_array($sql)) {
			$product_ID = $cartrow["PRODUCT_ID"];
			$price = $cartrow["PRICE"];
			$album = $cartrow["ALBUM_NAME"];
			$artist = $cartrow["ARTIST_NAME"];
			$album_IMG = $cartrow["ALBUM_IMG"];
			$type = $cartrow["TYPE"];
		}
		$pricetotal = $price * $each_item['quantity'];
		$cartTotal = $pricetotal + $cartTotal;
		setlocale(LC_MONETARY, "0");
        $pricetotal = money_format("%10.2n", $pricetotal);
		$x = $i + 1;
		$cartOutput .= "<tr class='productitm'>";
		$cartOutput .= "<td><img src='assets/images/AlbumArt/".$album_IMG."' class='thumb'></td>";
		$cartOutput .= "<td><input type='number' value='".$quantity."' min='0' max='99' class='qtyinput'></td>";
		$cartOutput .= "<td><span><b>".$artist."</b></span><br><span>".$album."</span><br><span><small>".$type."</small></span></td>";
		$cartOutput .= "<td>€".$pricetotal."</td>";
		$cartOutput .= "<td><form action='addToCart.php' method='post'><input name='index_to_remove' type='hidden' value='" . $i . "'/><button class='remove' name='deleteBtn" . $item_id . "' type='submit'><i class='fa fa-times-circle' alt='X'></i></span></button></form></td>";
		$cartOutput .= "</tr>";
		$cartOutput .= "<tr class='spaceUnder'>";
		$cartOutput .= "<td></td>";
		$cartOutput .= "<td colspan='3'><hr></td>";
		$cartOutput .= "<td></td>";
		$cartOutput .= "</tr>";
		}
	}
