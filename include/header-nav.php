<header>
	<div class="container">
		<div class="left-item">
			<div class="title font-cursive">
				<a href="events.php">Evema<span style="color: #ff5c62">Sys</span></a>
			</div>
		</div>
		<div class="right-item">
			<nav>
				<ul>
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'events.php') { echo 'class="active"';} ?>><a href="events.php">Events</a></li>
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'register-event.php') { echo 'class="active"';} ?>><a href="register-event.php">Create Event</a></li>
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'register-committee.php') { echo 'class="active"';} ?>><a href="register-committee.php">Add Committee</a></li>
					<li <?php if(basename($_SERVER['PHP_SELF']) == 'register-attendee.php') { echo 'class="active"';} ?>><a href="register-attendee.php">Register Attendee</a></li>	
					<li><a href="include/logout-inc.php" title="Log Out"><i class="fas fa-sign-out-alt"></i></a></li>			
				</ul>
			</nav>
			
		</div>	
	</div>	
</header>

<!--
<div class="sidebar">
	<h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
	<hr>
	<ul>
		<li <?php if(basename($_SERVER['PHP_SELF']) == 'events.php') { echo 'class="active"';} ?>><a href="events.php"><h3>Event List</h3></a></li>
		<li <?php if(basename($_SERVER['PHP_SELF']) == 'register-event.php') { echo 'class="active"';} ?>><a href="register-event.php"><h3>Register Event</h3></a></li>
		<li <?php if(basename($_SERVER['PHP_SELF']) == 'register-committee.php') { echo 'class="active"';} ?>><a href="register-committee.php"><h3>Register Committee Member</h3></a></li>
		<li <?php if(basename($_SERVER['PHP_SELF']) == 'register-attendee.php') { echo 'class="active"';} ?>><a href="register-attendee.php"><h3>Register Attendee</h3></a></li>						
	</ul>		
</div>
-->