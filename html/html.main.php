

<?php function drawHeader(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>GrooveSwap</title>
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
        <img class="spin" src="../imgs/vinyl-icon-500px.png" width="38" height="38"/>
        </div></li>
        <li><div class="search">
            <input type="text" placeholder="Search artists, albums, genres and more...">
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
            <form>
                <button class="login" type="button" onclick="location.href='login.php'">
                    Login
                </button>
                <button class="register" type="button" onclick="location.href='register.php'">
                    Register
                </button>
            </form>            
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