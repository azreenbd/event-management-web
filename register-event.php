<?php
	session_start();

	if (!isset($_SESSION['u_id'])) {
		header("Location: index.php");
		exit();
	}

	include 'include/dbh-inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Events</title>
	<link rel="stylesheet" type="text/css" href="src/style.css">
	<!--link rel="stylesheet" type="text/css" href="src/register-event.css">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
</head>
<body>
	<?php include 'include/header-nav.php'; ?>

	<div class="container flex-layout">
		<div class="sidebar">
			<h2>Hello, <br><?php echo $_SESSION['name']; ?>!</h2>

			<a href="register-event.php" class="btn">New Event</a>

			<ul class="plain-list text-center">
				<!--<li><a href="events.php"><h3>Event List</h3></a></li>-->
				<li><a href="register-committee.php">Add Committee Member</a></li>
				<li><a href="register-attendee.php">Register Attendee</a></li>						
			</ul>	
		</div>
		<div class="main">
			<h1>Create an Event</h1>
			<div class="panel">
				<div class="form-group">
					<form method="POST" action="include/register_event-inc.php">
						<div class="form-item">
							<label>Event name</label><br>
							<input type="text" name="event-name" placeholder="Workshop/Competition/Talk" required="on" autofocus="on">					
						</div>
						<div class="form-item">
							<label>Event date</label><br>
							<input type="date" name="event-date" required="on">					
						</div>
						<div class="form-item">
							<label>Event time</label><br>
							<input type="time" name="event-time" required="on">					
						</div>
						<div class="form-item">
							<label>Venue</label><br>
							<input type="text" name="event-venue" placeholder="MMU Cyberjaya..." required="on">
						</div>
						<div class="form-item">
							<label>Maximum number of attendees</label><br>
							<input type="number" name="event-quota" min="1" max="500" step="1" placeholder="Limited to 500 attendees." required="on">					
						</div>
						<div class="form-item">
							<label>Description</label><br>
							<textarea name="event-description" placeholder="The event is about....." required="on"></textarea>					
						</div>
						<div id="tentative">
							<p>
								<label>Add tentative</label><br>
								<input type="time" name="agenda-time-0" style="margin-bottom: .25rem"><br>
								<textarea name="agenda-description-0" placeholder="What is happening at this time?"></textarea>					
							</p>
						</div>
						<div class="form-item">
							<input type="button" name="" value="Add More Agenda(s)" onclick="addAgenda()">
						</div>
						<input type="submit" name="submit" value="Register">
					
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer-dark">
		<?php include 'include/footer.php'; ?>
	</footer>
	<script type="text/javascript">
		var count = 1;
		var tentative = document.getElementById("tentative");		
		function addAgenda(){
			var agenda = document.createElement("textarea");
			var time = document.createElement("input"); 
			var wrapper = document.createElement("p");           
            agenda.name = "agenda-description-" + count;
            agenda.placeholder = "What is happening at this time?"
            time.type = "time";
            time.style = "margin-bottom: .25rem";
            time.name = "agenda-time-" + count;
            wrapper.appendChild(time);
            wrapper.appendChild(agenda);
            tentative.appendChild(wrapper);
            count++;			
		}
	</script>
</body>
</html>