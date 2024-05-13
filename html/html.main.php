<?php function drawHeader(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>GrooveSwap</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-index.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
</head>
<body>
    <header>
        <input type="checkbox" id="hamburger"> 
        <label class="hamburger" for="hamburger"></label>
        <h1>
        <ul>
        <li><div class="logo">
            <a href="index.php">
                <span class="brand">GrooveSwap</span>
                <img class="spin" src="../imgs/vinyl-icon-500px.png" width="38" height="38">
            </a>
        </div></li>
        <li><div class="search">
            <input type="search" placeholder="Search artists, albums, genres and more...">
        </div></li>
        <li><nav id="topics">
            <ul>
            <a href="../pages/top.php"><li><p>Top</p></li></a>
            <a href="../pages/hot.php"><li><p>Hot</p></li></a>
            <a href="../pages/new.php"><li><p>New</p></li></a>
            </ul>
        </nav></li>
        <!-- idea is to change to a profile icon when loged in -->
        <li><div class="user"> 
            <?php
                if ($session->isLoggedIn()) {
                    $db = getDBConn();
                    $user = User::getUser($db, $session);
                    showLogout($session, $user);
                }
                else showLogin($session);
                ?>
        </div></li>
        </ul>
        <h1>
    </header>
<?php } ?>

<?php 
function drawBanner() { 
?>
    <div class="banner">
        <div class="box">
            <img class="bannerimg" src="../imgs/banner.jpg" height="400" alt="Smiling senior man holding a vinyl record">
            <div class="text-wrapper">
                <h2>Sell the Music You Don't Listen to Anymore </h2>
                <h2> and Find New Grooves!</h2>
                <form action="../php/sell.php" method="post">
                    <button class="sell" type="submit">Sell NOW</button>
                </form>
            </div>
        </div>
    </div>
<?php 
} 
?>


<?php function drawFooter() { ?>
    <footer>
    <p>&copy; 2024  GrooveSwap</p>
    </footer>
</body>
<?php } ?>