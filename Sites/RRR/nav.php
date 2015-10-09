<ul class="clearfix">
	<li>
		<a href="index.php">Home</a>
	</li>
	<li>
		<a href="#">Music</a>
		<div>
			<ul class="sub-menu">
				<li><a href='playlist.php'>Playlist</a></li>
				<li class="playertoggle"><a href="#">Player</a></li>
			</ul>
		</div>
	</li>
	<li>
		<?php session_start();
		if (isset($_SESSION['username'])){
			 	echo
		"<a href='#'>".$_SESSION['username']."</a>
		<div>
			<ul class='sub-menu'>
				<li><a href='logoutUser.php'>Log out</a></li>
			</ul>
		</div>
	</li>
	<li>
		<a href='shoppingCart.php'>Your Cart</a>
	</li>";
			}
			 else {
				echo
		"<a href='reg&log.php'>Login/Register</a>";} ?>
	</li>
</ul>
