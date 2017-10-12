<?php
	$curl = curl_init("http://localhost:8983/solr/safety/admin/ping?wt=json");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	$data = json_decode($output, true);
	echo "Ping Status: ";
	print_r($data['status'].PHP_EOL);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">


	<!--Jquery and UI-->
    <script src="jquery-ui/external/jquery/jquery.js"></script>
    <link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.theme.min.css">
    <script src="jquery-ui/jquery-ui.min.js"></script>

	<!--Css-->
	<link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

</head>
<body>
<nav>
	<div id="logo" class="navitem">LOGO</div>
	<div id="navbuttons" class="navitem">
		<b>
			<a href="">COOKIES OG PERSONVERN</a>
			<a href="">LOGG INN</a>
		</b>
	</div>
</nav>

<div id="search_container">
	<h2>FINN RAPPORTENE DU LETER ETTER</h2>
	<input type="search" name="searchfield" id="searchfield">
</div>

<div id="icon_container">
	<div>
		<img src="images/sikkerhet.svg" alt="ICON" class="icon">
		<span class="icon_heading">SIKKERHET</span> 
		<p>Textte xtt extet extetex tTex tt exttex te textetex tTextt extt extet extetext</p>
		<a href="">View collection</a>
	</div>
	<div>
		<img src="images/alarm_icon.svg" alt="ICON" class="icon">
		<span class="icon_heading">KRISEFORSIKRING</span>
		<p>Text Text text tex tetext etext Texttextte xtetexte textText te xtte xtetex tetext</p>
		<a href="">View collection</a>
	</div>
	<div>
		<img src="images/arbeidsmiljo_icon.svg" alt="ICON" class="icon">
		<span class="icon_heading">ARIBEIDSMILJØ</span>
		<p>Pass på </p>
		<a href="">View collection</a>
	</div>
</div>

<div id="aktuelt_container">
	<h2>AKTUELT</h2>
</div>


<br>

</body>
</html>