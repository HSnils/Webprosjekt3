<?php
	require_once ('pages/connect.php');

	if($user->is_loggedin()){
		//gets username from the session
		$userID = $_SESSION['username'];

		//changes the username to allways appear in uppercase when printed (and using th e variable)
		$printableUsername = strtoupper($userID);
	}

	if(isset($_POST['submit']) && $_POST['search'] != ''){
		$search = htmlentities($_POST['search']);
		$url = 'pages/search.php?search='.$search;
		header('Location: ' . $url);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Webproject 3</title>

		<!--Jquery and UI-->
	    <script src="jquery-ui/external/jquery/jquery.js"></script>
	    <link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
	    <link rel="stylesheet" href="jquery-ui/jquery-ui.structure.min.css">
	    <link rel="stylesheet" href="jquery-ui/jquery-ui.theme.min.css">|
	    <script src="jquery-ui/jquery-ui.min.js"></script>

	    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Css-->
		<link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

	</head>
	<body>

		<nav>
			<div  class="navitem"><img id="logo" src="images/logo.png"></div>
			<div id="navbuttons" class="navitem" >
				<b>
					<a href="">HJEM</a>
					<?php 
						if($user->is_loggedin()){

							echo "
							<a href='pages/admin.php'>ADMIN DASHBOARD</a>
							<a href='pages/logout.php?logout=true'>LOGG UT</a>";
						}else{
							echo "<a href='pages/login.php'>LOGG INN</a>";
						}

					?>
				</b>
			</div>
		</nav>

		<div id="search_container">
			<h2>FINN RAPPORTENE DU LETER ETTER</h2>
			<form id="searchfieldform" method="post">
				<input type="text" name="search" id="searchfield">
				<input type="submit" name="submit" value="Søk" id="searchSubmit">
			</form>

		</div>

		<div id="icon_container">
			<div>
				<img src="images/sikkerhet.svg" alt="ICON" class="icon">
				<span class="icon_heading">SIKKERHET</span> 
				<p>Sikkerhet er alltids viktig for å opprettholde en trygg og sikker hverdag på jobben.</p>
				<a href="pages/search.php?search=sikkerhet">Klikk for å se mer</a>
			</div>
			<div>
				<img src="images/alarm_icon.svg" alt="ICON" class="icon">
				<span class="icon_heading">KRISEFORSIKRING</span>
				<p>Kriseforsikring hjelper alle når man havner i en krise.</p>
				<a href="pages/search.php?search=kriseforsikring">Klikk for å se mer</a>
			</div>
			<div>
				<img src="images/arbeidsmiljo_icon.svg" alt="ICON" class="icon">
				<span class="icon_heading">ARBEIDSMILJØ</span>
				<p>Venner, Kollegaer, Sikkerhet, Luft, Område alle disse og mer bidrar på skape gode arbeidsmiljø.</p>
				<a href="pages/search.php?search=arbeidsmiljø">Klikk for å se mer</a>
			</div>
		</div>
	</body>
</html>