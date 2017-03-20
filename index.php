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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body class="container">
    <div class="titre-div">
        <div>
            <a href="/language">
            <img src="./img/logo.jpg" class="logo"/> 
            </a>
        </div>
        <div class="titre">
            <div>
                <h1 class="title has-text-centered">Entre ciel et terre</h1>
                <h2 class="subtitle has-text-centered">Entre la France et L'Inde<br/>Entre une selle de vélo et des rencontres</h2>
            </div>
        </div>
    </div>
<?php
if (file_exists($page)) {
    require_once($page);
}
else {
    require_once("404.php");
}
?>
    </div>
    <script type="text/javascript" src="js/jquery.3.2.0.js"></script>
</body>
</html>