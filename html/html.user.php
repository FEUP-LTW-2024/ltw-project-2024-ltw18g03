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
                <img class="userimg" type="image" src="../imgs/profiile/<?php echo $user->profilePicture; ?>.jpg" height=50 width=50 onclick="location.href='../pages/profile.php'">
<?php } ?>

<?php function drawHeaderRegister(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style.css" rel="stylesheet">
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

<?php function drawHeaderLogin(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style.css" rel="stylesheet">
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
    "Porto",
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

<?php function drawHeaderProfile(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style.css" rel="stylesheet">
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

<?php function drawProfile(Session $session) { ?>
    <?php $user = User::getUser(getDBConn(), $session); ?>
    <div class="profile-container">
    <div class="profile">
        <div class="profileimg">
            <img src="../imgs/profiile/<?php echo $user->profilePicture; ?>.jpg" height=200 width=200>
        </div>
        <div class="profileinfo">
            <h2><?php echo $user->firstName; echo " "; echo $user->lastName; ?></h2>
            <p>Email: <?php echo $user->email; ?></p>
            <p>Phone: <?php echo $user->phone; ?></p>
            <p>City: <?php echo $user->city; ?></p>
            <p>Postal Code: <?php echo $user->postalCode; ?></p>
        </div>
    </div>
    <div class="profileselling">
        <h2>Items for Sale</h2>
        <div class="profilealbums">
            <?php
                $items = Item::getItemsByUser(getDBConn(), $user->id);
                foreach ($items as $item): ?>
                    <div class="item-slab">
                        <div class="item-info">
                            <h4><?php echo $item->title; ?></h4>
                            <p><?php echo $item->condition; ?></p>
                            <p><?php echo $item->price; ?>€</p>
                        </div>
                        <div class="item-buttons">
                            <button>Buy</button>
                            <?php if ($session->isLoggedIn() && $session->getId() == $item->seller): ?>
                                <button>Edit</button>
                                <form method="POST" action="../php/delete.php">
                                    <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                                    <button type="submit">Delete</button>
                                </form>
                                <?php else: ?>
                                    <button>Message</button>
                                <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>
<?php } ?>