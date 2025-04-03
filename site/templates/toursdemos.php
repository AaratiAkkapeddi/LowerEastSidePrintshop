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

 <?= $page->body()->toBlocks() ?>
 <script>
      function insertAfter(referenceNode, newNode) {
          referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
      }
      let refNode = document.querySelector("main > *:nth-child(3)");

      var eDone = 'kyung'+'@'+'printshop'+'.'+'org';
      let txt = 'contact to inquire'
      var eSubject = 'Tour/Demo Inquiry';  // optional
      let el = document.createElement("a");
      el.classList.add("button")
      // el.classList.add("float-right")
      el.innerHTML = txt;
      el.href = "mai"+"lto:"+eDone+"?sub"+"ject="+eSubject
      insertAfter(refNode, el)
    //  document.write('<a class="button" '+'hre'+'f="mai'+'lto:'+eDone+'?sub'+'ject='+eSubject+'">'+txt+'</'+'a>');
   </script>
 </main>
<?php snippet('footer') ?>

