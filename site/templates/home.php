<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This home template renders content from others pages, the children of
  the `photography` page to display a nice gallery grid.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/

?>
<?php snippet('header') ?>
 <main>

  <?php 
$rows = $page -> slideshow() ->rows()->toStructure();
if($rows->isNotEmpty()):
?>
<table class="block-table">
  <tr>
    <th>Dish</th>
    <th>Description</th>
    <th>Price</th>
  </tr>
  <?php foreach( $rows as $row): ?>
    <tr>
    <td><?= $row->text() ?></td>
    <td>
    <img src="<?= $row->image()-> toObject() -> image() -> toFile() -> url()?>" />
    <p><?= $row->image()-> toObject() -> caption()?></p>
    </td>
    <td><?=  $row->url() ?> </td>
    </tr>
  <?php endforeach ?>
</table>
<?php endif; ?>
 <?= $page->top_of_page()->toBlocks() ?>
 <?= $page->bottom_of_page()->toBlocks() ?>


 </main>
<?php snippet('footer') ?>
