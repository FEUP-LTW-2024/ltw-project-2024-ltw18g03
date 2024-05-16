<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../db/class.user.php')
?>

<?php function showLogin(Session $session) { ?>
    <button class="login" type="button" onclick="location.href='../pages/login.php'">
                    Login
                </button>
                <button class="register" type="button" onclick="location.href='../pages/register.php'">
                    Register
                </button>
<?php } ?>
<?php function showLogout(Session $session, $user) { ?>
    <button class="logout" type="button" onclick="location.href='../php/logout.php'">
                    Logout
                </button>
                <img class="userimg" type="image" src="../imgs/profile/<?php echo $user->profilePicture; ?>.jpg" height=50 width=50 onclick="location.href='../pages/profile.php'">
<?php } ?>

<?php function drawHeaderRegister(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-register.css" rel="stylesheet">
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
          <p>Join the Community for Free</p>
        </div></li>
        </ul>
        <h1>
    </header>
<?php } ?>

<?php function drawHeaderAdmin(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-admin.css" rel="stylesheet">
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

<?php function drawHeaderEditProfile(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Edit</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-register.css" rel="stylesheet">
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
          <p>Edit Your Information</p>
        </div></li>
        </ul>
        <h1>
    </header>
<?php } ?>

<?php function drawHeaderLogin(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Login</title>
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
          <p>Join the Community for Free</p>
        </div></li>
        </ul>
        <h1>
    </header>
<?php } ?>

<?php function drawRegisterForm(Session $session) { ?>
  <form action="../php/register.php" class="form-horizontal" id="register_form" method="post" name="register_form" role="form">
    <div class="form-group">
        <label class="col-sm-3 control-label" for="firstname">First Name</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="firstname" name="firstname" placeholder="First Name" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="lastname">Last Name</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="lastname" name="lastname" placeholder="Last Name" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Email</label>
        <div class="col-sm-6">
            <input class="form-control" id="email" name="email" placeholder="Email" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">Password</label>
        <div class="col-sm-6">
            <input class="form-control" id="password" name="password" placeholder="Password" type="password" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="city">City</label>
        <div class="col-sm-6">
            <select class="form-control" id="city" name="city" required="required">
            <?php
$districts = array(
    "Porto",
    "Aveiro",
    "Beja",
    "Braga",
    "Bragança",
    "Castelo Branco",
    "Coimbra",
    "Évora",
    "Faro",
    "Guarda",
    "Leiria",
    "Lisboa",
    "Portalegre",
    "Santarém",
    "Setúbal",
    "Viana do Castelo",
    "Vila Real",
    "Viseu",
    "Açores",
    "Madeira"
);

function generateDistrictOptions($districts) {
    foreach ($districts as $district) {
        echo "<option>{$district}</option>\n";
    }
}

generateDistrictOptions($districts);
?>

            </select>
        </div>
    </div><!-- /.form-group -->
    <div class="form-group">
        <label class="col-sm-3 control-label" for="postal">Postal Code</label>
        <div class="col-sm-6">
            <input class="form-control" id="postal" name="postal" placeholder="XXXX-XXX" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="phone">Phone Number</label>
        <div class="col-sm-6">
            <input class="form-control" id="phone" name="phone" placeholder="XXXXXXXXX" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="profilePicture">Profile Picture</label>
        <div class="col-sm-6">
        <select class="form-control" id="profilePicture" name="profilePicture" required="required">
            <option value="white">White</option>
            <option value="red">Red</option>
            <option value="orange">Orange</option>
            <option value="yellow">Yellow</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="purple">Purple</option>
            <option value="pink">Pink</option>
        </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <div class="checkbox"></div>
        </div><!-- /.form-group -->
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="checkbox">
                    <label><input type="checkbox" required="required"><span>I accept </span><a href="#">Terms & Conditions</a></label>
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button class="btn" type="submit">Register</button>
            </div>
        </div>
    </div>
</form>
<?php } ?>
<?php function drawEditForm(Session $session) { ?>
  <form action="../php/edit-profile.php" class="form-horizontal" id="register_form" method="post" name="register_form" role="form">
    <div class="form-group">
        <label class="col-sm-3 control-label" for="firstname">First Name</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="firstname" name="firstname" placeholder="First Name" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="lastname">Last Name</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="lastname" name="lastname" placeholder="Last Name" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Email</label>
        <div class="col-sm-6">
            <input class="form-control" id="email" name="email" placeholder="Email" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">Password</label>
        <div class="col-sm-6">
            <input class="form-control" id="password" name="password" placeholder="Password" type="password">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="city">City</label>
        <div class="col-sm-6">
            <select class="form-control" id="city" name="city">
            <?php
$districts = array(
    "Porto",
    "Aveiro",
    "Beja",
    "Braga",
    "Bragança",
    "Castelo Branco",
    "Coimbra",
    "Évora",
    "Faro",
    "Guarda",
    "Leiria",
    "Lisboa",
    "Portalegre",
    "Santarém",
    "Setúbal",
    "Viana do Castelo",
    "Vila Real",
    "Viseu",
    "Açores",
    "Madeira"
);

generateDistrictOptions($districts);
?>

            </select>
        </div>
    </div><!-- /.form-group -->
    <div class="form-group">
        <label class="col-sm-3 control-label" for="postal">Postal Code</label>
        <div class="col-sm-6">
            <input class="form-control" id="postal" name="postal" placeholder="XXXX-XXX" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="phone">Phone Number</label>
        <div class="col-sm-6">
            <input class="form-control" id="phone" name="phone" placeholder="XXXXXXXXX" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="profilePicture">Profile Picture</label>
        <div class="col-sm-6">
        <select class="form-control" id="profilePicture" name="profilePicture">
            <option value="white">White</option>
            <option value="red">Red</option>
            <option value="orange">Orange</option>
            <option value="yellow">Yellow</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="purple">Purple</option>
            <option value="pink">Pink</option>
        </select>        
    </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <div class="checkbox"></div>
        </div><!-- /.form-group -->
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="checkbox">
                    <label><input type="checkbox" required="required"><span>I accept </span><a href="#">Terms & Conditions</a></label>
                </div>
            </div>
        </div><!-- /.form-group -->
        <input type="hidden" name="user" value="<?php echo $session->getId(); ?>">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button class="btn" type="submit">Update</button>
            </div>
        </div>
    </div>
</form>
<?php } ?>

<?php function drawLoginForm(Session $session) { ?>
  <form action="../php/login.php" class="form-horizontal" id="login-form" method="post" name="login-form" role="form">
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Email</label>
        <div class="col-sm-6">
            <input class="form-control" id="email" name="email" placeholder="Email" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">Password</label>
        <div class="col-sm-6">
            <input class="form-control" id="password" name="password" placeholder="Password" type="password" required="required">
        </div>
    </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="register-now">
                    Don't have an account? <a href="../pages/register.php">Register for Free</a>
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <button class="btn" type="submit">Login</button>
            </div>
        </div>
    </div>
</form>
<?php } ?>

<?php
function printUserTable($db) {
//now output the data to a simple html table...
print "<table border=1>";
print "<tr><td>First Name</td><td>Last Name</td><td>Email</td><td>Password</td><td>Phone Number</td><td>Postal Code</td><td>City</td></tr>";
$result = $db->query('SELECT * FROM User');
foreach($result as $row)
{
 print "<tr><td>".$row['firstName']."</td>";
 print "<td>".$row['lastName']."</td>";
 print "<td>".$row['email']."</td>";
 print "<td>".$row['passwordHash']."</td>";
 print "<td>".$row['phone']."</td>";
 print "<td>".$row['postalCode']."</td>";
 print "<td>".$row['city']."</td></tr>";
}
print "</table>";
}
?>

<?php function drawUsers(Session $session, Array $users) {?>
    <div class="users">
        
        <div class="top">
                <div id="hot"> </div>
                <h2>Users</h2>
        </div>
        <button id="register" type="button" onclick="location.href='../pages/register.php'">
                    Add User
        </button>
        <?php foreach ($users as $user): ?>
            <div class="us">
                <div class="userimg">
                    <img src="../imgs/profile/<?php echo $user->profilePicture; ?>.jpg" height=50 width=50>
                </div>
                <div class="userinfo">
                    <h3><?php echo $user->name(); ?></h3>
                    <p><?php echo $user->email; ?></p>
                    <p><?php echo $user->isAdmin() ? "Admin" : "User"; ?></p>
                </div>
                <div class="userbuttons">
                    <?php if (!$user->isAdmin()): ?>
                        <form method="POST" action="../php/make-admin.php">
                            <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                            <button type="submit">Make Admin</button>
                        </form>
                    <?php endif; ?>
                    <form method="POST" action="../php/delete-user.php">
                        <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                        <button id="delete" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } ?>

<?php function drawHeaderProfile(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-profile.css" rel="stylesheet">
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

<?php function drawProfile(Session $session) { ?>
    <?php $user = User::getUser(getDBConn(), $session); ?>
    <div class="profile-container">
        <div class="profile">
            <div class="profileimg">
                <img src="../imgs/profile/<?php echo $user->profilePicture; ?>.jpg" height=200 width=200>
            </div>
            <div class="profileinfo">
                <h2><?php echo $user->firstName; echo " "; echo $user->lastName; ?></h2>
                <p>Email: <?php echo $user->email; ?></p>
                <p>Phone: <?php echo $user->phone; ?></p>
                <p>City: <?php echo $user->city; ?></p>
                <p>Postal Code: <?php echo $user->postalCode; ?></p>
            </div>
            <div class="profilebuttons">
                <button type="submit" onclick="location.href='../pages/edit_profile.php'">Edit Profile</button>
                <?php if ($user->isAdmin()) { ?>
                    <button onclick="location.href='../pages/admin.php'">Admin Panel</button>
                <?php } ?>
                <button type="submit" onclick="location.href='../pages/wishlist.php'">Wishlist</button>
                <div class="mail">
                    <button id="sent" type="submit" onclick="location.href='../pages/sent.php'">Sent</button>
                    <button id="received" type="submit" onclick="location.href='../pages/received.php'">Received</button>
                </div>
            </div>
        </div>
        <div class="profileselling">
            <div class="top">
                <div id="hot"> </div>
                <h2>Items for Sale</h2>
            
            </div>
            <div class="profilealbums">
                <?php
                    $items = Item::getItemsByUser(getDBConn(), $user->id);
                    foreach ($items as $item): ?>
                        <div class="item-slab">
                            <div class="item-img">
                                <?php
                                $album = Album::getAlbumByID(getDBConn(), $item->album);
                                ?>
                                <img class="item-image" src="<?php echo $album->cover; ?>" height=82 width=82>
                                <h2><?php echo $album->artist; ?> - <?php echo $album->title; ?></h2>
                            </div>
                            <div class="item-info">
                                <h4><?php echo $item->title; ?></h4>
                                <p><?php echo $item->condition; ?></p>
                                <p><?php echo $item->price; ?>€</p>
                            </div>
                            <div class="item-buttons">
                                <?php if ($session->isLoggedIn() && $session->getId() == $item->seller):
                                        if ($item->sold):?>
                                            <button>Sold</button>
                                        <?php else: ?>
                                            <form method="POST" action="../pages/edit_item.php">
                                                <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                                <button type="submit">Edit</button>
                                            </form>
                                        <?php endif; ?>
                                    <form method="POST" action="../php/delete.php">
                                        <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                        <button id="delete" type="submit">Delete</button>
                                    </form>
                                    <?php else: ?>
                                        <button>Buy</button>
                                        <button id="message">Message</button>
                                    <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php } ?>