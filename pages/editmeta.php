<?php
	require_once 'connect.php';

	if($user->is_loggedin()){
		//gets username from the session
		$userID = $_SESSION['username'];

		//changes the username to allways appear in uppercase when printed (and using th e variable)
		$printableUsername = strtoupper($userID);
	} else {
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<title>Webproject 3</title>

		<!--Jquery and UI-->
	    <script src="../jquery-ui/external/jquery/jquery.js"></script>
	    <link rel="../stylesheet" href="jquery-ui/jquery-ui.min.css">
	    <link rel="../stylesheet" href="jquery-ui/jquery-ui.structure.min.css">
	    <link rel="../stylesheet" href="jquery-ui/jquery-ui.theme.min.css">
	    <script src="../jquery-ui/jquery-ui.min.js"></script>

	    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

		<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>

		<!--Css-->
		<link rel="stylesheet" href="../css/main.css?<?php echo time(); ?>">

	</head>
	<body>

		<!--includes navigation-->
		<?php include('partials/nav.php') ?>

		<?php if(isset($_GET['id'])) : ?>

		<?php 
		require('../solarium/init.php');

		htmlHeader();

		// create a client instance
		$client = new Solarium\Client($config);

		// get a select query instance
		$query = $client->createSelect();

		// set a query (all prices starting from 12)
		$query->setQuery('id:' . $_GET['id']);

		// set start and rows param (comparable to SQL limit) using fluent interface
		$query->setStart(0)->setRows(1);

		// this executes the query and returns the result
		$resultset = $client->select($query);

		foreach ($resultset AS $document) {
		    $document->getFields();
		}

		 ?>

		<div class="contentbox">
			
			<h4>Edit pdf metadata</h4>
			<form id="editform" action="edit_handler.php" method="POST" enctype="multipart/form-data">
				<div>
					<label for="title">ID: <i class="fas fa-asterisk tinyIcon red"></i></label>
				    <input type="text" name="ID" required <?php if(isset($document['id'])) : ?> readonly="readonly" value="<?php echo $document['id']; endif; ?>">

					<label for="title">Title: <i class="fas fa-asterisk tinyIcon red"></i></label>
				    <input type="text" name="title" required <?php if(isset($document['title'])) : ?> value="<?php echo $document['title']; endif; ?>">

				    <label for="title">Author: <i class="fas fa-asterisk tinyIcon red"></i></label>
				    <input type="text" name="author" required <?php if(isset($document['author'])) : ?> value="<?php echo $document['author']; endif; ?>">
				    
				    <label for="title">Operator: <i class="fas fa-asterisk tinyIcon red"></i></label>
				    <input type="text" name="operator" required <?php if(isset($document['operator'])) : ?> value="<?php echo $document['operator']; endif; ?>">

				    <label for="title">Responsible: <i class="fas fa-asterisk tinyIcon red"></i></label>
				    <input type="text" name="responsible" required  <?php if(isset($document['responsible'])) : ?> value="<?php echo $document['responsible']; endif; ?>">

				    <label for="title">Year: <i class="fas fa-asterisk tinyIcon red"></i></label>
				    <input type="text" name="year" required  <?php if(isset($document['year'])) : ?> value="<?php echo $document['year']; endif; ?>" maxlength="4">
			    </div>

			    <input type="submit" name="edit_btn" value="Edit Metadata" class="inputbuttons">
			</form>

			<div>	Fields with  <i class="fas fa-asterisk tinyIcon red"></i> is required for file to be uploaded/edited!</div>
		</div>

		<?php endif; ?>
	</body>
</html>