<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modification</title>
    <script src="../js/jquery-2.2.1.min.js"></script>
    <script src="../js/base64.js"></script>
	<!-- Latest compiled and minified CSS 
	<link rel="stylesheet" href="../css/bulma.css">-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- css -->
	<link rel="stylesheet" href="../css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- font Raleay-->
	
	<link href="../css/fileupload.css" media="all" rel="stylesheet" type="text/css" />
	<!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
		 This must be loaded before fileinput.min.js -->
	<script src="../js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
	<script src="../js/fileinput.min.js" type="text/javascript"></script>
	
</head>
<body>
<?php
include('../pages/connect.php');
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="container">