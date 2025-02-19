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

<h1 id="artist-title">Artists

<div id="artist-list-toggle" >
<a>Switch to List View</a>
<a>Switch to Grid View</a>
</div>
</h1>



<div class="exhibition-list grid">
  <?php foreach($page->children()-> sortBy('last_name', 'asc') as $subpage): ?>
  <div class="exhibition-card">
    <a href="<?= $subpage->url() ?>">
    <div class="exhibition-card-image" style="background-image: url('<?= $subpage ->  main_img() -> toFile() -> url() ?>');"></div>

      <?= html($subpage->title()) ?>
    </a>
  </div>
  <?php endforeach ?>
  </div>


  <div class="exhibition-list list">
    <?php $current_letter = "a"?>
    <?php $current_letter_count = 0 ?>
  <?php foreach($page->children()-> sortBy('last_name', 'asc') as $subpage): ?>

    <?php if(str_starts_with($subpage -> last_name(), $current_letter)): ?>
      <?php $current_letter_count += 1 ?>
    <?php else: ?>
      <?php $current_letter_count = 0 ?>
      <?php $current_letter =  substr($subpage ->last_name(), 0, 1) ?>
    <?php endif;?>
    <?php if($current_letter_count == 0): ?>
      <h1><?= $current_letter ?></h1>
    <?php endif; ?>
  <div class="exhibition-card">
    <a href="<?= $subpage->url() ?>">

      <?= html($subpage->title()) ?>
    </a>
  </div>



  <?php endforeach ?>
  </div>
  <script type="text/javascript">
    document.querySelector("#artist-list-toggle a:first-child").addEventListener("click", function(){
      document.querySelector("#artist-list-toggle").classList.add("list");
      document.querySelector(".exhibition-list.list").classList.add("show");
      document.querySelector(".exhibition-list.grid").classList.add("hide");
    })
    document.querySelector("#artist-list-toggle a:last-child").addEventListener("click", function(){
      document.querySelector("#artist-list-toggle").classList.remove("list");
      document.querySelector(".exhibition-list.list").classList.remove("show");
      document.querySelector(".exhibition-list.grid").classList.remove("hide");
    })
    </script>
 </main>
<?php snippet('footer') ?>

