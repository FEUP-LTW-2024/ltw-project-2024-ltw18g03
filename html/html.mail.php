<?php 
    declare(strict_types = 1); 
    require_once(__DIR__ . '/../db/connection.db.php');
    require_once(__DIR__ . '/../db/class.album.php');
    require_once(__DIR__ . '/../db/class.item.php');
    require_once(__DIR__ . '/../db/class.user.php');
    require_once(__DIR__ . '/../db/class.mail.php');

?>
<?php function drawHeaderMail(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Mail</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-login.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>
        <ul>
        <li><div class="logo">
            <a href="index.php">
                <span class="brand">GrooveSwap</span>
                <img class="spin" src="../imgs/vinyl-icon-500px.png" width="38" height="38">
            </a>
        </div></li>
        <li><div id="register">
          <p>Message the Seller</p>
        </div></li>
        </ul>
        <h1>
    </header>
<?php } ?>
<?php function drawHeaderSent(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Sent</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-inbox.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <script src="../js/search.js" defer></script>
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
        <li>
            <form id="searchForm" action="../pages/results.php" method="GET">
                <div class="search">
                    <input type="search" id="searchInput" name="query" placeholder="Search artists, albums, genres and more...">
                    <button type="submit">Search</button>
                </div>
            </form>
            <ul id="searchResults"></ul>    
        </li>
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
<?php function drawHeaderReceived(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Received</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-inbox.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <script src="../js/search.js" defer></script>
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
        <li>
            <form id="searchForm" action="../pages/results.php" method="GET">
                <div class="search">
                    <input type="search" id="searchInput" name="query" placeholder="Search artists, albums, genres and more...">
                    <button type="submit">Search</button>
                </div>
            </form>
            <ul id="searchResults"></ul>    
        </li>
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
<?php function drawReply($session, $itemID, $receiverID, $title) { ?>
    <section id="mail">
        <form action="../php/send.php" class="form-horizontal" id="login-form" method="post" name="login-form" role="form">
        <div class="form-group">
        <label for="content">Body:</label>
            <div class="col-sm-6">
            <textarea id="content" class="form-control" name="content" rows="4" cols="50" required></textarea>
            </div>
        </div>
            <input type="hidden" name="title" value="<?= $title ?>">
            <input type="hidden" name="itemID" value="<?= $itemID ?>">
            <input type="hidden" name="receiverID" value="<?= $receiverID ?>">
            <input type="hidden" name="senderID" value="<?= $session->getId() ?>">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button class="btn" type="submit">Send</button>
            </div>
        </div>
    </div>
    </form>
</section>
<?php } ?>
<?php function drawSend($session, $itemID, $receiverID) { ?>
    <section id="mail">
        <form action="../php/send.php" class="form-horizontal" id="login-form" method="post" name="login-form" role="form">
        <div class="form-group">
        <label for="title">Subject:</label>
            <div class="col-sm-6">
                <input class="form-control" name="title" type="text" required="required">
            </div>
        </div>
        <div class="form-group">
        <label for="content">Body:</label>
            <div class="col-sm-6">
            <textarea id="content" class="form-control" name="content" rows="4" cols="50" required></textarea>
            </div>
        </div>
            <input type="hidden" name="itemID" value="<?= $itemID ?>">
            <input type="hidden" name="receiverID" value="<?= $receiverID ?>">
            <input type="hidden" name="senderID" value="<?= $session->getId() ?>">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button class="btn" type="submit">Send</button>
            </div>
        </div>
    </div>
    </form>
</section>
<?php } ?>

<?php function drawMail(Mail $mail, bool $isUserSender) { 
    if ($isUserSender) {
        $user = User::getUserById(getDBConn(), $mail->receiverID);
    } else {
        $user = User::getUserById(getDBConn(), $mail->senderID);
    }
    $item = Item::getItemById(getDBConn(), $mail->itemID);
    ?>
    <div class="mail">
        <div class="mail-header">
            <div class="mail-sender">
                <p><?php echo $isUserSender ? "Sent to: " : "From: "; ?><?= $user->firstName ?> <?= $user->lastName ?>  </p>
            </div>
            <div class="mail-title">
            <h2><?= $mail->title  ?> / <?= $item->title ?></h2>
            </div>
            <div class="mail-timest">
                <p><?= $mail->timest ?></p>
            </div>
            <?php if (!$isUserSender) { ?>
                <div class="mail-buttons">
                    <form action="../pages/write.php" method="POST">
                        <input type="hidden" name="itemId" value="<?= $item->id ?>">
                        <input type="hidden" name="dest" value="<?= $mail->senderID ?>">
                        <input type="hidden" name="title" value="<?= $mail->title ?>">
                        <button type="submit" name="reply">Reply</button>
                    </form>
                </div>
            <?php } ?>
            </div>
        <div class="mail-content">
            <p><?= $mail->content ?></p>
        </div>
    </div>
<?php } ?>
<?php function drawSentMail(array $mails) { 
    usort($mails, function($a, $b) {
        return $b->timest <=> $a->timest;
    });?>
     <div class="top">
        <div id="new"> </div>
        <h2>Sent Messages</h2>
    </div>
    <section id="mails">
        <?php foreach ($mails as $mail) {
            drawMail($mail, true);
        } ?>
    </section>
<?php } ?>
<?php function drawReceivedMail(array $mails) { 
    usort($mails, function($a, $b) {
        return $b->timest <=> $a->timest;
    });?>
     <div class="top">
        <div id="new"> </div>
        <h2>Received Messages</h2>
    </div>
    <section id="mails">
        <?php foreach ($mails as $mail) {
            drawMail($mail, false);
        } ?>
    </section>
<?php } ?>