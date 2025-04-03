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





<div class="class-page"> 
<img src="<?php echo($page ->  main_img() -> toFile() ? $page ->  main_img() -> toFile() -> url() :'')  ?>"/>
 <h1><?= html($page->title()) ?></h1>
<?php if($page-> registration_full() ->toBool() === true):?>
  <em>This class is currently full </em>
<?php else: ?>
  <a class="button" target="_blank" href="<?= $page->register() ?>">Register</a>

<?php endif; ?>


 <?= $page->description()->toBlocks() ?>
</div>
 </main>
<?php snippet('footer') ?>

