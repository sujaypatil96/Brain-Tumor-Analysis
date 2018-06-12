<?php
	// Start the session
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>Data Sets</title>
	<link rel="stylesheet" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300" rel="stylesheet">
	<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
</head>

<style type="text/css">
	/* Customize the label (the container) */
	.container {
		display: block;
		position: relative;
		padding-left: 35px;
		margin-bottom: 12px;
		cursor: pointer;
		font-size: 22px;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	/* Hide the browser's default checkbox */
	.container input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
	}

	/* Create a custom checkbox */
	.checkmark {
		position: absolute;
		top: 0;
		left: 0;
		height: 25px;
		width: 25px;
		background-color: #eee;
	}

	/* On mouse-over, add a grey background color */
	.container:hover input ~ .checkmark {
		background-color: #ccc;
	}

	/* When the checkbox is checked, add a blue background */
	.container input:checked ~ .checkmark {
		background-color: #2196F3;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}

	/* Show the checkmark when checked */
	.container input:checked ~ .checkmark:after {
		display: block;
	}

	/* Style the checkmark/indicator */
	.container .checkmark:after {
		left: 9px;
		top: 5px;
		width: 5px;
		height: 10px;
		border: solid white;
		border-width: 0 3px 3px 0;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		transform: rotate(45deg);
	}
</style>

<body>
	<form action="index.php" method="post" id="datasets">

		<div><h1>Select the Data Sets of your choice:</h1></div>
		<br>

		<label class="container">Barres Data
			<input type="checkbox" checked="checked">
			<span class="checkmark"></span>
		</label>

		<label class="container">IvyGap Data
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<label class="container">hGAMs
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<label class="container">Darmannis
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<label class="container">IDHm
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<label class="container">OG
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<label class="container">Patel GBM
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<label class="container">TCGA
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<label class="container">POLA
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<label class="container">CGGA
			<input type="checkbox">
			<span class="checkmark"></span>
		</label>

		<button type="submit" name="submit" id="submit">Submit</button>
	</form>

</body>
</html>
