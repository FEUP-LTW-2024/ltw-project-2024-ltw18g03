<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../db/album.class.php')
?>

<?php function drawTheme() { //trendy keyword ?>

<?php } ?>

<?php function drawTop(array $albums, int $n) {
    usort($albums, function($a, $b) {
        return $b->rym <=> $a->rym;
    });?>   
    <div class="top">
        <div id="top"> </div>
        <h2>Top of All Time</h2>
    </div>
    <div class="shelf">
    <?php for ($i = 0; $i < min(count($albums), $n); $i++):
        $album = $albums[$i];
    ?>
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
                <button>Buy</button>
                <button>Want</button>
                <button>Sell</button>
            </div>
        </div>    
    <?php endfor; ?>
    </div>    
<?php } ?>

<?php function drawHot(array $albums, int $n) { //most items
    usort($albums, function($a, $b) {
        return $b->quantity <=> $a->quantity;
    });?>
    <div class="top">
        <div id="hot"> </div>
        <h2>Hot Right Now</h2>
    </div>
    <div class="shelf">
    <?php for ($i = 0; $i < min(count($albums), $n); $i++):
        $album = $albums[$i];
    ?>
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
                <button>Buy</button>
                <button>Want</button>
                <button>Sell</button>
            </div>
        </div>    
    <?php endfor; ?>
    </div>    
<?php } ?>

<?php function drawNew(array $albums, int $n) { //recent date 
    usort($albums, function($a, $b) {
        return $b->yearOfRelease <=> $a->yearOfRelease;
    });?>
    <div class="top">
        <div id="new"> </div>
        <h2>New Releases</h2>
    </div>
    <div class="shelf">
    <?php for ($i = 0; $i < min(count($albums), $n); $i++):
        $album = $albums[$i];
    ?>
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
                <button>Buy</button>
                <button>Want</button>
                <button>Sell</button>
            </div>
        </div>    
    <?php endfor; ?>
    </div>    
<?php } ?>