<!DOCTYPE html>
<?php

	if (!require_once $_SERVER["DOCUMENT_ROOT"] . "/lib/person.php") {
		echo "FAILED TO LOAD";
	}
	
	$firstName = $_GET['first'];
	$lastName = $_GET['last'];
	
	$person = new Person($firstName, $lastName);

?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-xs-12">
			Just made a new person!  <?=$person->getName()?>
			<br/>
			<br/>
		</div>
	</div>
		<div class="row">
			<div class="col-xs-12">
				<form action="person.php" method="get" class="form-inline">
				  <div class="form-group">
					<label for="first">First Name</label>
					<input type="text" class="form-control" id="first" name="first" placeholder="First Name">
				  </div>
				  <br/>
				  <br/>
				  <div class="form-group">
					<label for="last">Last Name</label>
					<input type="text" class="form-control" id="last" name="last" placeholder="Last Name">
				  </div>
				  <br/>
				  <br/>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<br><br><br>
				End of page
			</div>
		</div>
	</div>
	
	
</body>
</html>