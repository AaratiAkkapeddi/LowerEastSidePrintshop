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
<a class="bread-crumb" href="/artworks">Back to all artists</a>
  <h1><?= $page->title() ?></h1>


  <div class="artist-gallery">
  <?php $artworks = $page-> artworks() -> toStructure()  ?>
  <?php $counter = 0 ?>
  <?php foreach( $artworks as $artwork): ?>
    <?php $counter += 1 ?>
    <div class="artist-page-image-card" style="background-image: url('<?= $artwork -> image() -> toFile() -> url() ?>');">
    <div class="artwork-card-hidden">
      <img src=<?= $artwork -> image() -> toFile() -> url() ?> />
      <h2><?= $artwork -> title() ?></h2>
      <div data-text="<?= $artwork -> title() ?> by <?= $page -> title () ?>" class="card-after"><?= $artwork -> info() ?></div>




   
    </div>
    </div>
  <?php endforeach?>
  </div>
  <script>
      function insertAfter(referenceNode, newNode) {
          referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
      }

      let refs = document.querySelectorAll(".card-after");
      refs.forEach((refNode)=>{
        let eDone = 'marie'+'@'+'printshop'+'.'+'org';
        let txt = 'contact to inquire'
        var eSubject = 'PURCHASE INQUIRY: ' + refNode.dataset.text.replace(/(<([^>]+)>)/ig, '')
        let el = document.createElement("a");
        el.classList.add("button")
        el.innerHTML = txt;
        el.href = "mai"+"lto:"+eDone+"?sub"+"ject="+eSubject
        insertAfter(refNode, el)
      })

      

   </script>
   <div id="artist-bio">
    <?= $page->bio()->toBlocks() ?> 
   </div>

 </main>
<?php snippet('footer') ?>
<div id="light-box">
  <div id="light-box-close"><svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.125" y="47.1914" width="65.7249" height="4.55194" transform="rotate(-45 0.125 47.1914)" fill="#333333"/>
<rect width="65.7249" height="4.34812" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 49.7461 47.2637)" fill="#333333"/>
</svg>
</div>
  <div class="inner">
    
  </div>
</div>

<script type="text/javascript">

  let cards = document.querySelectorAll(".artist-page-image-card");
  cards.forEach((artwork) => {
    artwork.addEventListener("click", function(){
      let stuff = this.querySelector(".artwork-card-hidden").innerHTML;
      let lightBox = document.querySelector("#light-box");
      lightBox.classList.add("open");
      lightBox.querySelector(".inner").innerHTML = "";
      lightBox.querySelector(".inner").innerHTML = stuff;
      
    })
  })

  let lightBoxClose = document.getElementById("light-box-close");
  let lightBox = document.querySelector("#light-box");
  lightBoxClose.addEventListener("click", function(){
    lightBox.classList.remove("open");
    lightBox.querySelector(".inner").innerHTML = "";
  })

</script>
