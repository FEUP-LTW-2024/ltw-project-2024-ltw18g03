<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../db/album.class.php')
?>

<?php function drawTheme() { //trendy keyword ?>

<?php } ?>

<?php function drawTop(array $albums) { ?>    
    <div id="top">
        <h2>Top Selling of All Time</h2>
        <div class="shelf">
        <?php foreach ($albums as $album): ?>
            <div class="card">
            <img src="<?php echo $album->cover; ?>" width="250px">
            <h3><?php echo $album->title; ?></h3>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>

<?php function drawHot() { //most items ?> 

<?php } ?>

<?php function drawNew() { //recent date ?>

<?php } ?>