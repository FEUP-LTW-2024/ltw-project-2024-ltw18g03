<?php 
    declare(strict_types = 1); 
    require_once(__DIR__ . '/../db/connection.db.php');
    require_once(__DIR__ . '/../db/class.album.php');
    require_once(__DIR__ . '/../db/class.item.php');
    require_once(__DIR__ . '/../db/class.user.php');

?>
<?php function drawHeaderSell(Session $session) { ?>
<!DOCTYPE html>
<head>
    <title>Sell Now</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imgs/favicon2.ico">
    <link href="../css/style-sell.css" rel="stylesheet">
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
          <p>Sell Your Grails</p>
        </div></li>
        <?php 
        $user = User::getUserByID(getDBConn(), $session->getId());
        if ($user->isAdmin()) {
            ?>
            <li><div id="settings">
            <a href="../pages/debug.php">&#9763;</a>
            </div></li>
            <?php } ?>
        </ul>
        <h1>
    </header>
<?php } ?>

<?php function drawsellNow(Session $session) { ?>
    <form action="../php/item.php" class="form-horizontal" id="register_form" method="post" name="item_form" role="form">
    <div class="form-group">
        <label class="col-sm-3 control-label" for="title">Title</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="title" name="title" placeholder="Write something catchy!" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="description">Description</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="description" name="description" placeholder="Why should it be bought?" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="album">Album</label>
        <div class="col-sm-6">
            <select class="form-control" id="album" name="album" required="required">
            <?php
$albums = Album::getAlbums(getDBConn());

function generateAlbumOptions(Array $albums) {
    for ($i = 0; $i < count($albums); $i++):
        $album = $albums[$i];
        echo "<option value=\"{$album->id}\">{$album->title} - {$album->artist}</option>\n";
        endfor;
}

generateAlbumOptions($albums);
?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="price">Price</label>
        <div class="col-sm-6">
            <input class="form-control" id="price" name="price" placeholder="€" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="condition">Condition</label>
        <div class="col-sm-6">
            <select class="form-control" id="condition" name="condition">
                <option value="Mint">Mint</option>
                <option value="Near Mint">Near Mint</option>
                <option value="Very Good">Very Good</option>
                <option value="Light Scratches">Light Scratches</option>
                <option value="Damaged Cover">Damaged Cover</option>
                <option value="Scratched">Scratched</option>
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
                <button class="btn" type="submit">Publish</button>
            </div>
        </div>
        <input type="hidden" name="seller" value="<?php echo $session->getId(); ?>">
    </div>
</form>
<?php } ?>

<?php function drawSell(Session $session, Album $album) { ?>
    <form action="../php/item.php" class="form-horizontal" id="register_form" method="post" name="item_form" role="form">
    <div class="form-group">
        <label class="col-sm-3 control-label" for="title">Title</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="title" name="title" placeholder="Write something catchy!" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="description">Description</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="description" name="description" placeholder="Why should it be bought?" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="price">Price</label>
        <div class="col-sm-6">
            <input class="form-control" id="price" name="price" placeholder="€" type="text" required="required">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="condition">Condition</label>
        <div class="col-sm-6">
            <select class="form-control" id="condition" name="condition">
                <option value="Mint">Mint</option>
                <option value="Near Mint">Near Mint</option>
                <option value="Very Good">Very Good</option>
                <option value="Light Scratches">Light Scratches</option>
                <option value="Damaged Cover">Damaged Cover</option>
                <option value="Scratched">Scratched</option>
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
                <button class="btn" type="submit">Publish</button>
            </div>
        </div>
        <input type="hidden" name="album" value="<?php echo $album->id; ?>">
        <input type="hidden" name="seller" value="<?php echo $session->getId(); ?>">
    </div>
</form>
<?php } ?>
<?php function drawEditItemForm(Session $session, string $item) { ?>
    <form action="../php/edit-item.php" class="form-horizontal" id="register_form" method="post" name="item_form" role="form">
    <div class="form-group">
        <label class="col-sm-3 control-label" for="title">Title</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="title" name="title" placeholder="Write something catchy!" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="description">Description</label>
        <div class="col-sm-6">
            <input autofocus="" class="form-control" id="description" name="description" placeholder="Why should it be bought?" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="price">Price</label>
        <div class="col-sm-6">
            <input class="form-control" id="price" name="price" placeholder="€" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="condition">Condition</label>
        <div class="col-sm-6">
            <select class="form-control" id="condition" name="condition">
                <option value="Mint">Mint</option>
                <option value="Near Mint">Near Mint</option>
                <option value="Very Good">Very Good</option>
                <option value="Light Scratches">Light Scratches</option>
                <option value="Damaged Cover">Damaged Cover</option>
                <option value="Scratched">Scratched</option>
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
                <button class="btn" type="submit">Update</button>
            </div>
        </div>
        <input type="hidden" name="item" value="<?php echo $item; ?>">
    </div>
</form>
<?php } ?>
<?php function drawConfirm($session, $itemID, $date) {
    $item = Item::getItemByID(getDBConn(), $itemID);
    $album = Album::getAlbumByID(getDBConn(), $item->album);
    $seller = User::getUserByID(getDBConn(), $item->seller);
    $buyer = User::getUserByID(getDBConn(), $session->getId());
    ?>
    <div class="container">
        <div class="buy">
                <div id="hot"> </div>
                <h2>Confirm Your Purchase</h2>
            
            </div>

        <div class="confirmer">
                <h2>Are you sure you want to list the following item?</h2>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $item->title; ?></h3>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $item->description; ?></p>
                        <p>Price: <?php echo $item->price; ?>€</p>
                        <p>Condition: <?php echo $item->condition; ?></p>
                        <p>Album: <?php echo $album->title; ?> by <?php echo $album->artist; ?></p>
                        <p>Seller: <?php echo $seller->name(); ?></p>
                        <p>Email: <?php echo $seller->email; ?></p>
                        <p>Phone Number: <?php echo $seller->phone ?></p>
                    </div>
                    <h3>Shipping</h3>
                    <div class="shipping">
                        <p>Shipping costs an extra 2.99€.</p>
                    </div>
                    <h3>Total</h3>
                    <div class="total">
                        <p><?php echo $item->price + 2.99; ?>€</p>
                    </div>
                    <div class="terms">
                        <p>By clicking confirm, you agree to our terms and conditions.</p>
                    </div>
                </div>
                <form action="../php/confirm-item.php" method="post">
                    <input type="hidden" name="itemID" value="<?php echo $itemID; ?>">
                    <input type="hidden" name="buyerID" value="<?php echo $buyer->id; ?>">
                    <input type="hidden" name="time" value="<?php echo $date; ?>">
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </form>
    </div>
<?php } ?>
<?php function drawReceiptHeader() { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39&family=Libre+Barcode+39+Extended+Text&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Print</title>
    <link rel="stylesheet" href="../css/style-receipt.css">
    </head>
    <body>
<?php } ?>

<?php function drawReceipt($item, $time) {
    $item = Item::getItemByID(getDBConn(), $item);
    $album = Album::getAlbumByID(getDBConn(), $item->album);
    $seller = User::getUserByID(getDBConn(), $item->seller);
    $buyer = User::getUserByID(getDBConn(), $item->buyer);
    ?>
    <div class="receipt">
        <h2>Thank you for your purchase!</h2>
        <h3>Please Print this page<h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $item->title; ?></h3>
            </div>
            <div class="panel-body">
                <p><?php echo $item->description; ?></p>
                <p>Price: <?php echo $item->price; ?>€</p>
                <p>Condition: <?php echo $item->condition; ?></p>
                <p>Album: <?php echo $album->title; ?> by <?php echo $album->artist; ?></p>
                <p>Seller: <?php echo $seller->name(); ?></p>
                <p>Email: <?php echo $seller->email; ?></p>
                <p>Phone Number: <?php echo $seller->phone ?></p>
                <p><?php echo $time ?></p>
            </div>
            <h3>Shipping</h3>
            <div class="shipping">
                <p>Your item will arrive in two business days</p>
            </div>
            <h3>Total</h3>
            <div class="total">
                <p><?php echo $item->price + 2.99; ?>€</p>
            </div>
        </div>
    </div>
<?php } ?>


<?php
function printItemTable($db) {
//now output the data to a simple html table...
print "<table border=1>";
print "<tr><td>id</td><td>title</td><td>description</td><td>album</td><td>price</td><td>condition</td><td>seller</td></tr>";
$statement = $db->query('SELECT * FROM Item');
while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
print "<tr><td>".$row['ID']."</td><td>".$row['title']."</td><td>".$row['descriptionOfItem']."</td><td>".$row['album']."</td><td>".$row['price']."</td><td>".$row['condition']."</td><td>".$row['seller']."</td></tr>";
}
}?>