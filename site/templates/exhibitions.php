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
<?php if( $page -> featured()): ?>

<div class="slide-show">
   <a href="<?= $page  -> featured() -> toPage() ?>" class="slide">

    <div class="text"><?= $page -> featured() -> toPage() ->  title() ?></div>
    <img src="<?= $page  -> featured() -> toPage() ->  main_img() -> toFile() -> url() ?>" />
  
  </a>

</div>
<?php endif ?>



 

<h2>Past Exhibitions</h2>
<div class="exhibition-list">
  <?php foreach($page->children() as $subpage): ?>
  <div class="exhibition-card">
    <a href="<?= $subpage->url() ?>">
    <div class="exhibition-card-image" style="background-image: url('<?= $subpage ->  main_img() -> toFile() -> url() ?>');"></div>

      <?= html($subpage->title()) ?>
    </a>
  </div>
  <?php endforeach ?>
  </div>
 </main>
<?php snippet('footer') ?>

