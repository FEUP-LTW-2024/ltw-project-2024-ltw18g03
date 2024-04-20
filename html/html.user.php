<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../db/class.user.php')
?>


<?php function drawHeaderRegister(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>GrooveSwap - Register</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>
        <ul>
        <li><div class="logo">
        <a href="index.php">GrooveSwap</a>
        <img class="spin" src="../imgs/vinyl-icon-500px.png" width="40" height="40"/>
        </div></li>
        
        </ul>
        <h1>
    </header>
<?php } ?>

<?php function drawHeaderLogin(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>GrooveSwap - Login</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>
        <ul>
        <li><div class="logo">
        <a href="index.php">GrooveSwap</a>
        <img class="spin" src="../imgs/vinyl-icon-500px.png" width="40" height="40"/>
        </div></li>
        
        </ul>
        <h1>
    </header>
<?php } ?>