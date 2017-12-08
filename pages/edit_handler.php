<?php
	
	if (!empty($_POST['edit_btn'])) {


		$ch = curl_init("http://localhost:8983/solr/safety/update?commit=true");

		$data = array(
		          "id" => $_POST['ID'],
		          "title" => array(
		          	"set" => $_POST['title']),
		          "author" => array(
		          	"set" => $_POST['author']),
		          "operator" => array(
		          	"set" => $_POST['operator']),
		          "responsible" => array(
		          	"set" => $_POST['responsible'])
		          );

		$data_string = json_encode(array($data));          

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

		echo curl_exec($ch);

	} else {
		echo "This is not a valid pdf file.";
		unset($_FILES['userFile']);

		header("Location: editmeta.php");
  		exit();
	}