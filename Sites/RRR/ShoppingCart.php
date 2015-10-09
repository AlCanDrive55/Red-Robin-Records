<!DOCTYPE html>
<html lang="en">
<head>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<title>RRR - Index</title>
	<link rel="stylesheet" href="css/style.css">
	<meta name="description" content="Red Robin Records">
	<meta name="keywords" content="Music">
	<meta name="author" content="Alan Flood">
</head>
<?php include 'addToCart.php'; ?>
<body>
	<div id="big_wrapper" class="morningmenu">
		<?php include 'banner.php'; ?>
		<nav class="menu nightmenu">
			<?php include 'nav.php'; ?>
		</nav>
		<div id="center-wrap">
			<div id="cart-wrap" class="wrap">
			    <header id="title">
			    	<div class="steps row">
					<div class="line"></div>
						<div class="step">
							<div class="circle active">1</div>
							<div class="label"><span class="responsive_hide"> <b>Shopping</span> Cart<b></div>
	  					</div><!-- end "step" -->
	  					<div class="step">
	  						<div class="circle">2</div>
	  						<div class="label">Order<span class="responsive_hide"> Information</span></div>
	  					</div><!-- end "step" -->
	  					<div class="step">
	  						<div class="circle">3</div>
	  						<div class="label">Shipping<span class="responsive_hide"> Information</span></div>
	  					</div><!-- end "step" -->
	  					<div class="step">
	  						<div class="circle">4</div>
	  						<div class="label">Payment<span class="responsive_hide"> Options</span></div>
	  					</div><!-- end "step" -->
					</div><!-- end "steps" -->
		    	</header>
			    <div id="page">
				    <table id="cart">
					    <thead>
							<tr>
								<th class="first"></th>
								<th class="second"><small>Qty</small></th>
								<th class="third"><small>Product</small></th>
								<th class="fourth"><small>Price</small></th>
								<th class="fifth">&nbsp;</th>
							</tr>
	        			</thead>
	        			<tbody>
					        <?php echo $cartOutput; ?>
					          <!-- tax + subtotal -->
					        <tr class="totalprice">
					            <td class="light">
						        <?php
						    		if (isset($_SESSION['cart_array']) || count ($_SESSION['cart_array']) >= 1){
							    		echo
											"Total before Shipping: ";} ?>
								</td>
					            <td colspan="2">&nbsp;</td>
					            <td colspan="2"><span class="thick"></span></td>
					        </tr>
					          <!-- checkout btn -->
					        <tr class="checkoutrow">
					            <td colspan="3" class="checkout">
						    <?php
						    	if (isset($_SESSION['cart_array']) || count ($_SESSION['cart_array']) >= 1){
							    	echo
										"<button id='submitbtn' class='button'>Checkout</button>";}
								else{ echo "<td> </td>";}
							?>
						        </td>
					            <td colspan="2"><i class="fa fa-refresh" alt="Refresh Cart"> Refresh Cart</i></td>
					        </tr>
			        	</tbody>
			    	</table>
			    </div>
			</div>
		</div>
		<footer  class="nightmenu">
			<div>
				<img src="assets/images/FooterMorning.jpg">
			</div>
			<div id="menu">
				<p>Alan Flood 2015</p>
			</div>
		</footer>
	</div>
</body>
</html>