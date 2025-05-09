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
<h1><?= $page->title() ?></h1>
<div class="class-list">
  <?php foreach($page->children() as $subpage): ?>
  <div class="class-card">

    <a href="<?= $subpage->url() ?>" class="class-card-image" style="background-image: url('<?php echo ($subpage ->  main_img() -> toFile()) ? $subpage ->  main_img() -> toFile() -> url(): ''; ?>');"></a>

     <div class="class-card-text"> 
      <h2><?= html($subpage->title()) ?></h2>
    <?= $subpage->excerpt() ?>
    <a class="button" href="<?= $subpage->url() ?>">More info</a></div>
    
  </div>
  <?php endforeach ?>
  </div>
 </main>
<?php snippet('footer') ?>

