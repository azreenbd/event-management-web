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
	<link rel="stylesheet" type="text/css" href="src/register-event.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
</head>
<body>
	<?php include 'include/header-nav.php'; ?>

	<div class="create-event">
		<div class="create-event-container">
			<div class="create-event-form">
				<form method="POST" action="include/register_event-inc.php">
					<p>
						<label><strong>Event Name:</strong></label><br>
						<input type="text" name="event-name" placeholder="Workshop/ Competition/ Talk" required="on">					
					</p>
					<p>
						<label><strong>Event Date: </strong></label><br>
						<input type="date" name="event-date" required="on">					
					</p>
					<p>
						<label><strong>Event Time: </strong></label><br>
						<input type="time" name="event-time" required="on">					
					</p>
					<p>
						<label><strong>Venue: </strong></label><br>
						<input type="text" name="event-venue" placeholder="MMU Cyberjaya..." required="on">
					</p>
					<p>
						<label><strong>Maximum Number of Attendees: </strong></label><br>
						<input type="number" name="event-quota" min="1" max="500" step="1" placeholder="Limited to 500 attendees." required="on">					
					</p>
					<p>
						<label><strong>Description: </strong></label><br>
						<textarea name="event-description" placeholder="The event is about....." required="on"></textarea>					
					</p>
					<div id="tentative">
						<p>
							<label><strong>Add Tentative: </strong></label><br>
							<input type="time" name="agenda-time-0"> <br>
							<textarea name="agenda-description-0" placeholder="What is happening now?"></textarea>					
						</p>
					</div>
					<input type="button" name="" value="Add More Agenda(s)" onclick="addAgenda()">
					<input type="submit" name="submit" value="Register">
				
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var count = 1;
		var tentative = document.getElementById("tentative");		
		function addAgenda(){
			var agenda = document.createElement("textarea");
			var time = document.createElement("input"); 
			var wrapper = document.createElement("p");           
            agenda.name = "agenda-description-" + count;
            agenda.placeholder = "What is happening now?"
            time.type = "time";
            time.name = "agenda-time-" + count;
            wrapper.appendChild(time);
            wrapper.appendChild(agenda);
            tentative.appendChild(wrapper);
            count++;			
		}
	</script>
</body>
</html>