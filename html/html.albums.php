<?php 
    declare(strict_types = 1); 

    require_once(__DIR__ . '/../db/class.album.php');
    require_once(__DIR__ . '/../db/class.item.php');
?>

<?php function drawHeaderAlbum(Session $session, Album $album) { ?>
<!DOCTYPE html>
<head>
    <title><?php echo $album->title; ?></title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-item.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <script src="../js/search.js" defer></script> <!-- Include the JavaScript file -->
</head>
<body>
<header>
    <input type="checkbox" id="hamburger"> 
    <label class="hamburger" for="hamburger"></label>
    <h1>
        <ul>
            <li>
                <div class="logo">
                    <a href="index.php">
                        <span class="brand">GrooveSwap</span>
                        <img class="spin" src="../imgs/vinyl-icon-500px.png" width="38" height="38">
                    </a>
                </div>
            </li>
            <li>
                <div class="search">
                    <input type="search" id="searchInput" placeholder="Search artists, albums, genres and more...">
                    <ul id="searchResults"></ul>
                </div>
            </li>
            <li>
                <nav id="topics">
                    <ul>
                        <a href="../pages/top.php"><li><p>Top</p></li></a>
                        <a href="../pages/hot.php"><li><p>Hot</p></li></a>
                        <a href="../pages/new.php"><li><p>New</p></li></a>
                    </ul>
                </nav>
            </li>
            <li>
                <div class="user"> 
                    <?php
                        if ($session->isLoggedIn()) {
                            $db = getDBConn();
                            $user = User::getUser($db, $session);
                            showLogout($session, $user);
                        }
                        else showLogin($session);
                    ?>
                </div>
            </li>
        </ul>
    </h1>
</header>
<?php } ?>

<?php function drawTheme() { //trendy keyword ?>

<?php } ?>

<?php function drawCard(Album $album) { ?>
    <div class="card">
        <img src="<?php echo $album->cover; ?>" width="260px">
        <div class="title">
            <h3><?php echo $album->title; ?></h3>
            <p><?php echo $album->artist; ?></p>
        </div>
        <div class="desc">
            <p><?php echo $album->yearOfRelease; ?></p>
            <p><?php echo $album->genre; ?></p>
            <p><?php echo $album->quantity; ?> for <?php echo $album->averagePrice; ?>€</p>
        </div>
        <div class="buttons">
            <form action="../pages/album.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $album->id; ?>">
                <button type="submit" name="action" value="buy">Buy</button>
            </form>
            <button>Want</button>
            <form action="../php/sell.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $album->id; ?>">
                <button type="submit" name="action" value="sell">Sell</button>
            </form>
        </div>
    </div> 
<?php } ?>

<?php function drawTopS(array $albums, int $n) {
    usort($albums, function($a, $b) {
        return $b->rym <=> $a->rym;
    });?>   
    <div class="top">
    <a href="../pages/top.php">
        <div id="top"> </div>
        <h2>Top of All Time</h2>
    </a>
    </div>
    <div class="shelf-wrapper">
        <div class="shelf">
            <?php for ($i = 0; $i < min(count($albums), $n); $i++):
                $album = $albums[$i];
                drawCard($album);
                endfor; ?>
        </div> 
    </div>   
<?php } ?>

<?php function drawHotS(array $albums, int $n) { //most items
    usort($albums, function($a, $b) {
        return $b->quantity <=> $a->quantity;
    });?>
    <div class="top">
    <a href="../pages/hot.php">
        <div id="hot"> </div>
        <h2>Hot Right Now</h2>
    </a>
    </div>
    <div class="shelf-wrapper">
        <div class="shelf">
        <?php 
        for ($i = 0; $i < min(count($albums), $n); $i++):
            $album = $albums[$i];
            drawCard($album);
            endfor; 
        ?>
        </div>
    </div>    
<?php } ?>

<?php function drawNewS(array $albums, int $n) { //recent date 
    usort($albums, function($a, $b) {
        return $b->yearOfRelease <=> $a->yearOfRelease;
    });?>
    <div class="top">
    <a href="../pages/new.php">
        <div id="new"> </div>
        <h2>New Releases</h2>
    </a>
    </div>
    <div class="shelf-wrapper">
        <div class="shelf">
        <?php 
        for ($i = 0; $i < min(count($albums), $n); $i++):
            $album = $albums[$i];
            drawCard($album);
            endfor; 
        ?>
        </div>        
    </div>    
<?php } ?>

<?php function drawTopP(array $albums) {
    usort($albums, function($a, $b) {
        return $b->rym <=> $a->rym;
    });?>   
    <div class="top">
        <div id="top"> </div>
        <h2>Top of All Time</h2>
    </div>
    <div class="page">
    <?php 
    for ($i = 0; $i < count($albums); $i++):
        $album = $albums[$i];
        drawCard($album);
        endfor; 
    ?>
    </div>    
<?php } ?>

<?php function drawHotP(array $albums) { //most items
    usort($albums, function($a, $b) {
        return $b->quantity <=> $a->quantity;
    });?>
    <div class="top">
        <div id="hot"> </div>
        <h2>Hot Right Now</h2>
    </div>
    <div class="page">
    <?php 
    for ($i = 0; $i < count($albums); $i++):
        $album = $albums[$i];
        drawCard($album);
        endfor; 
    ?>
    </div>    
<?php } ?>

<?php function drawNewP(array $albums) { //recent date 
    usort($albums, function($a, $b) {
        return $b->yearOfRelease <=> $a->yearOfRelease;
    });?>
    <div class="top">
        <div id="new"> </div>
        <h2>New Releases</h2>
    </div>
    <div class="page">
    <?php 
    for ($i = 0; $i < count($albums); $i++):
        $album = $albums[$i];
        drawCard($album);
        endfor; 
    ?>
    </div>
<?php } ?>
<?php function drawBuy(Session $session, Album $album) { ?>
    <div class="album_wrapper">
        <div class="album">
            <div class="album_banner">
                <img src="<?php echo $album->cover; ?>" width="260px">
            </div>
            <div class="album_info">
                <h2><?php echo $album->artist; ?> - <?php echo $album->title; ?></h2>
            </div>
            <div class="album_desc">
                <h3>Album Details</h3>
                <p>Released: <?php echo $album->yearOfRelease; ?></p>
                <p>Genre: <?php echo $album->genre; ?></p>
                <p>RYM Rating: <?php echo $album->rym; ?></p>
            </div>
            <?php 
            $db = getDBConn();
            $items = Item::getItemsByAlbum($db, $album->id); 
            ?>
            <div class="album_prices">
                <h3>For Sale on GrooveSwap</h3>
                <p><?php echo $album->quantity; ?> albums for <?php echo $album->averagePrice; ?>€ </p>
            </div>
        </div>
        <div class="items">
            <div class="top">
                <div id="hot"> </div>
                <h2>Items for Sale</h2>
            
            </div>
            <div class="items-window">
            <?php foreach ($items as $item): ?>
                <?php
                        $user = User::getUserByID($db, $item->seller); //get user
                        ?>
                <div class="item-slab">
                    <div class="item-seller">
                        <h4><?php echo $user->firstName; echo " "; echo $user->lastName;  ?></h4>
                        <p>From: <?php echo $user->city; ?></p>   
                        <p>Contact: <?php echo $user->phone; ?></p> 
                    </div>
                    <div class="item-info">
                        <h4><?php echo $item->title; ?></h4>
                        <p><?php echo $item->condition; ?></p>
                        <p><?php echo $item->price; ?>€</p>
                    </div>
                    <div class="item-buttons">
                                <?php if ($session->isLoggedIn() && $session->getId() == $item->seller): ?>
                                    <button >Edit</button>
                                    <form method="POST" action="../php/delete.php">
                                        <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                        <button id="delete" type="submit">Delete</button>
                                    </form>
                                    <?php else: ?>
                                        <button>Buy</button>
                                        <button class="message">Message</button>
                                    <?php endif; ?>
                            </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php } ?>