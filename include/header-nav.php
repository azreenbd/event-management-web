<div class="header">
	<div class="container">
		<div class="title">
			<h1>Event Management System</h1>
		</div>
		<div class="logout">
			<a href="include/logout-inc.php" title="Log Out"><i class="fas fa-sign-out-alt"></i></a>
		</div>	
	</div>	
</div>

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