<!-- Top Naviagation Bar -->
<div class="top-nav">
	<!-- Hamburger Menu Icon -->
	<a class="menu-icon"><i class="fas fa-bars"></i></a>
	<!-- Navigation Links -->
	<div id="nav-links">
		<a href="search.php" <?php if ($currentPage === "search") {echo "class='current'";} ?>>Search</a>
		<a href="resource.php" <?php if ($currentPage === "resources") {echo "class='current'";} ?>>Resources</a>
		<a href="about.php" <?php if ($currentPage === "about") {echo "class='current'";} ?>>About</a>
		<a href="admin.php" <?php if ($currentPage === "admin") {echo "class='current'";} ?>><i class="fas fa-lock"></i></a>
	</div>
	<a href="search.php" id="logo">USC Emergency Logs</a>
</div>