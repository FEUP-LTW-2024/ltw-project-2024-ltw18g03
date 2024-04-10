

<?php function drawHeader(Session $session) { ?>
    <!DOCTYPE html>
<head>
    <title>GrooveSwap</title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>
        <ul>
        <li><div class="logo">
        <a href="index.php">GrooveSwap</a>
        </div></li>
        <li><div class="search">
            <input type="search" placeholder="Search artists, albums and more...">
        </div></li>
        <li><nav id="topics">
            <ul>
                <li><a href="pages/new.php">New</a></li>
                <li><a href="pages/hot.php">Hot</a></li>
            </ul>
        </nav></li>
        <!-- idea is to change to a profile icon when loged in -->
        <li><div class="login"> 
            <form>
                <button formaction="login.php" formmethod="post" type="submit">
                    Login
                </button>
                <button formaction="register.php" formmethod="post" type="submit">
                    Register
                </button>
            </form>            
        </div></li>
        </ul>
        <h1>
    </header>
<?php } ?>

<?php function drawFooter(Session $session) { ?>
    <footer>
    <p>&copy; 2024  GrooveSwap</p>
    </footer>
</body>
<?php } ?>