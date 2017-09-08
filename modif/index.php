<?php
header('X-XSS-Protection: 0');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modification</title>
    <script src="../js/jquery.3.2.0.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../css/bulma.css">
	<!-- css -->
	<link rel="stylesheet" href="../css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
    <h1 class="title is-1">Modification du site</h1>
    <li><a href="addvideo.php">Ajouter une vidéo</a></li>
    <li><a href="addmessage.php">Ajouter un message</a></li>
    <li><a href="addphoto.php">Ajouter des photos</a></li>
    
    <li><a href="deletemessage.php">Supprimer un message</a></li>
    <li><a href="deletevideo.php">Supprimer une vidéo</a></li>
    <li><a href="deletephoto.php">Supprimer des photos</a></li>
</div>
</body>
</html>