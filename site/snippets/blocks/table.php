<?php 
$rows = $block ->rows()->toStructure();

?>
<div class="accordion">

  <?php foreach( $rows as $row): ?>


    <details>
       <summary><?= $row->title() ?> <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.2856 1.94116L7.23811 8.44336L1.22068 1.94116" stroke="#E03C31" stroke-width="2" stroke-linecap="round"/>
</svg>
</summary>
       <div> <?= $row-> description() ?></div>
    </details>

  <?php endforeach ?>

</div>