<?php 
$rows = $block ->rows()->toStructure();

?>
<?php if( $page -> slug() == "staff-board" or $page -> slug() == "internships"): ?>

  <?php foreach( $rows as $row): ?>
  <div class="staff-member">
    <div class="staff-image"><img src="<?= $row -> image() -> toFile() -> url() ?>"/></div>
    <div class="staff-bio"><?= $row -> bio() -> toBlocks()?></div>
  </div>
  <?php endforeach?>
<?php else: ?>
<div class="accordion">

  <?php foreach( $rows as $row): ?>


    <details>
       <summary><?= $row->title() ?> <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.2856 1.94116L7.23811 8.44336L1.22068 1.94116" stroke="#E03C31" stroke-width="2" stroke-linecap="round"/>
</svg>
</summary>
<?php if( $row -> artist()):?>
    <ul class="artists">
    <?php $artists = $row-> artists() -> toPages() ?>
    <?php foreach( $artists as $artist): ?>
        <li>
        <a  class="artist-name" href="<?= $artist -> url() ?>"> <?= $artist -> title() ?></a><br>
        <div class="artist-image-cards">
        <?php $artworks = $artist-> artworks() -> toStructure() -> limit(3) ?>
        <?php foreach( $artworks as $artwork): ?>
         <a href="<?= $artist -> url() ?>" style="background-image: url('<?= $artwork -> image() -> toFile() -> url() ?>');" class="artist-image-card"></a>
        <?php endforeach?>
        </div>
        </li>


    <?php endforeach ?>
    </ul>

  
<? else: ?>
       <div> <?= $row-> description() ?></div>
<?php endif; ?>
    </details>

  <?php endforeach ?>

</div>
<?php endif ?>