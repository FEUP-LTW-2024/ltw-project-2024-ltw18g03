<!DOCTYPE html>
<head>
    <title>GrooveSwap</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="imgs/favicon2.ico">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>
        <ul>
        <li><div class="logo">
        <a href="index.php">GrooveSwap</a>
        <img class="spin" src="imgs/vinyl-icon-500px.png" width="40" height="40"/>
        </div></li>
        <li><div class="search">
            <input type="text" placeholder="Search artists, albums and more...">
        </div></li>
        <li><nav id="topics">
            <ul>
                <li><a href="pages/new.php">New</a></li>
                <li><a href="pages/hot.php">Hot</a></li>
            </ul>
        </nav></li>
        <!-- idea is to change to a profile icon when loged in -->
        <li><div class="user"> 
            <form>
                <button class="login" formaction="php/login.php" formmethod="post" type="submit">
                    Login
                </button>
                <button class="register" formaction="php/register.php" formmethod="post" type="submit">
                    Register
                </button>
            </form>            
        </div></li>
        </ul>
        <h1>
    </header>
    <main>    
        <section id="publications">
            <p> content </p>
        </section>
    </main>
    <footer>
    <p>&copy; 2024  GrooveSwap</p>
    </footer>
</body>