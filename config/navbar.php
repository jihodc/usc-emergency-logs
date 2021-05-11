<!-- Top Naviagation Bar -->
<div class="top-nav">
	<!-- Hamburger Menu Icon -->
	<a class="menu-icon"><i class="fas fa-bars"></i></a>
	<!-- Navigation Links -->
	<div id="nav-links">
		<a href="search.php" <?php if ($currentPage === "search") {echo "class='current'";} ?>>Search</a>
		<a href="resource.php" <?php if ($currentPage === "resources") {echo "class='current'";} ?>>Resources</a>
		<a href="about.php" <?php if ($currentPage === "about") {echo "class='current'";} ?>>About</a>
		<?php 
			// show lock when not logged in
			if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]): 
		?>
			<a href="admin.php" <?php if ($currentPage === "admin") {echo "class='current'";} ?>><i class="fas fa-lock"></i></a>
		
		<?php else: ?>
			<a href="admin-home.php" <?php if ($currentPage === "admin-home") {echo "class='current'";} ?>><?php echo $_SESSION["username"];?></a>
			<a href="logout.php">Logout</a>
		
		<?php endif; ?>
	
	</div>
	<a href="search.php" id="logo">USC Emergency Logs</a>
</div>