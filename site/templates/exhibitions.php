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
    <div class="img " style="background-image:url('<?php echo ($page  -> featured() -> toPage() ->  main_img() -> toFile())  ? $page  -> featured() -> toPage() ->  main_img() -> toFile() -> url() : "" ?>');background-position:<?php echo ($page  -> featured() -> toPage() ->  main_img() -> toFile()) ? $page  -> featured() -> toPage() ->  main_img() -> toFile() -> focus() -> coords() : '' ?>"></div>
  </a>

</div>
<?php endif ?>



 

<h2>Past Exhibitions</h2>


<div id="exhibitions-filter">
<div id=year-filter>
<label>Filter by year:</label>
<select>
  <option>All </option>
  <?php $years = [] ?>
<?php foreach($page->children() as $subpage): ?>
  <?php array_push($years, substr(($subpage -> start_date()), 0, 4)); ?>
<?php endforeach ?>
<?php $years =  array_unique($years);?>
<?php rsort($years, SORT_NUMERIC); ?>
<?php foreach($years as $year): ?>
  <option><?php echo $year ?></option>
<?php endforeach  ?>
</select>
</div>
  <div id="checklist">
  <input type="checkbox" id="art-fair" name="art-fair" value="art-fair" checked>
  <label for="art-fair"> Art Fair</label><br>
  <input type="checkbox" id="exhibition" name="exhibition" value="exhibition" checked>
  <label for="exhibition"> Exhibition </label><br>
  <span id="warning">please select at least one*</span>
  </div>
</div>
<div class="exhibition-list">
  <?php foreach($page->children() as $subpage): ?>
    
  <div class="exhibition-card all <?php echo ($subpage -> art_fair() -> bool()) ? 'art-fair' : 'exhibition'; ?> <?php echo 'year-'.substr(($subpage -> start_date()), 0, 4) ?>">
    <a href="<?= $subpage->url() ?>">
    <div class="exhibition-card-image" style="background-image: url('<?= $subpage ->  main_img() -> toFile() -> url() ?>');"></div>

      <?= html($subpage->title()) ?>
      <?= $subpage -> display_date() ?>
    </a>
  </div>
  <?php endforeach ?>
  </div>
 </main>
 <script type="text/javascript">
      let warning = document.querySelector("#warning")
  function upDateFilter(){
    let selectElement = document.querySelector('#year-filter select');
    let cards =  document.querySelectorAll(".exhibition-card");
    let currentArtFair = true;
    let currentExhibition = true;
    let currentYear = selectElement.value;
    let artFairCheck = document.querySelector("#art-fair");
    let exhibitionCheck = document.querySelector("#exhibition")


    cards.forEach((card)=>{
      /* art fair / exhibition */
      card.classList.remove("hide");
      if(!artFairCheck.checked && card.classList.contains("art-fair")){
        card.classList.add("hide")
      }else if(!exhibitionCheck.checked && card.classList.contains("exhibition")){
        card.classList.add("hide")
      }else if(currentYear != "All" && !card.classList.contains("year-"+currentYear)){
        card.classList.add("hide")
      }
    })


  }

   upDateFilter()
    

    document.querySelector("#art-fair").addEventListener("change",function(){
      if(!document.querySelector("#exhibition").checked && !document.querySelector("#art-fair").checked){
        warning.classList.add('on')
        setTimeout(function(){
          warning.classList.remove("on")
          
        },1000)
      }else{
         upDateFilter()     
      }

    })
    document.querySelector("#exhibition").addEventListener("change",function(){
      if(!document.querySelector("#exhibition").checked && !document.querySelector("#art-fair").checked){
        warning.classList.add('on')
        setTimeout(function(){
          warning.classList.remove("on")
        },1000)
      }else{
         upDateFilter()     
      }
    })

    document.querySelector("#year-filter select").addEventListener("change", function(){
        upDateFilter();
    })
        
 </script>
<?php snippet('footer') ?>

