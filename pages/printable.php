<?php 
declare(strict_types = 1);
require_once(__DIR__ . '/../php/session.php');
$session = new Session();


require_once(__DIR__ . '/../db/connection.db.php');

require_once(__DIR__ . '/../db/class.album.php');
require_once(__DIR__ . '/../db/class.item.php');

require_once(__DIR__ . '/../html/html.main.php');
require_once(__DIR__ . '/../html/html.albums.php');
require_once(__DIR__ . '/../html/html.user.php');

function drawPrintableHeader() { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39&family=Libre+Barcode+39+Extended+Text&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Print</title>
        <link rel="stylesheet" href="../css/style-print.css">
    </head>
    <body>
<?php }
function drawPrintable($id) { 
    $item = Item::getItemById(getDBConn(), $id);
    $buyer = User::getUserById(getDBConn(), $item->buyer);
    $seller = User::getUserById(getDBConn(), $item->seller);
    ?>
    <section id="printable">
        <table>
            <tr>
                <td> <img src="../imgs/ctt.jpg" width="150" height="150"> </td>
                <td> <img src="../imgs/vinyl-icon.jpg" width="150" height="150"></td>
                <td> <h1> Expedition: 00<?php echo $id; ?>55 </h1> </td>
            </tr>
            <tr>
                <td colspan="2"> <?php echo $seller->name(); ?> </td>
                <td rowspan="4"> <h1>Standard Package</h1> </td>
            </tr>
            <tr>
                <td colspan="2"> <?php echo $seller->city ?> </td>
            </tr>
            <tr>
                <td colspan="2"> <?php echo $seller->postalCode ?> </td>
            </tr>
            <tr>
                <td colspan="2">Phone: <?php echo $seller->phone ?> </td>
            </tr>
           
                <td colspan="2"> <?php echo $buyer->name(); ?> </td>
                <td rowspan="4" class="libre-barcode-39-regular">*<?php echo $item->id;?>GRV<?php echo $item->buyer;?>SWP<?php echo $item->seller;?>*</td>
            </tr>
            <tr>
                <td colspan="2"> <?php echo $buyer->city ?> </td>
            </tr>
            <tr>
                <td colspan="2"> <?php echo $buyer->postalCode ?> </td>
            </tr>
            <tr>
                <td colspan="2">Phone: <?php echo $buyer->phone ?> </td>
            </tr>
            <tr>
                <td colspan="3"><h3> Additional Info: </h3></td>
            </tr>
        </table>
    </section>
<?php }
  

 

    drawPrintableHeader();
    drawPrintable($_POST['item_id']);

    ?>
