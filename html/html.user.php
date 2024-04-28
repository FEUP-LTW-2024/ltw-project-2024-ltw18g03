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
<?php function showLogout(Session $session) { ?>
    <button class="logout" type="button" onclick="location.href='../php/logout.php'">
                    Logout
                </button>
                <button class="user" type="button" onclick="location.href='../pages/user.php'">
                    User
                </button>
<?php } ?>

<?php function drawHeaderRegister(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Register</title>
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
        <li><div id="register">
          <p>Join the Community for Free</p>
        </div></li>
        <li><div id="settings">
        <a href="../pages/debug.php">&#9763;</a>
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
</head>
<body>
    <header>
        <h1>
        <ul>
        <li><div class="logo">
        <a href="index.php">GrooveSwap</a>
        <img class="spin" src="../imgs/vinyl-icon-500px.png" width="40" height="40"/>
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
                <div class="checkbox">
                    <label><input type="checkbox" required="required"><span>Remember Me</span></label>
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