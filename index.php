<?php
$querystring = htmlspecialchars($_SERVER['QUERY_STRING']);
if (empty($querystring)) {
    $params = "language";
}
else {
    $params = $querystring;
}
$folder = explode("/", $params)[0];
$page = "pages/" . $params . ".php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Entre ciel et terre</title>
    <link rel="stylesheet" href="css/bulma.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <?php /*if ($folder == "hobbies") { echo "<link rel='stylesheet' href='css/photoswipe.css' type='text/css'>"; }*/ ?>
    <meta name="description" content=" Entre la france et l'Inde Entre nos selles de vélo et des rencontres">
    <meta name="keywords" content="Augustin,Théophile,Rigal,fraternité,irak,Vélo,chrétien,entre,ciel,terre,aventure">
    <meta name="author" content="Barnabas Csomor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery.3.2.0.js"></script>
</head>
<body>

<?php
if (file_exists($page)) {
    require_once($page);
}
else {
    require_once("404.php");
}
?>

</body>
</html>