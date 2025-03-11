<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
  <!-- </main> -->

  <footer class="footer">
    <div class="inner">
      <div>  <?= $site->address() ?></div>
      <div>  <?= $site->hours() ?></div>
      <div>  <?= $site->contact() ?></div>
      <div>sign up for our newsletter<br>
      <div id="colophon">Website Colophon<div>This website was designed and developed by <a target="_blank" href="https://aarati.online">Aarati Akkapeddi</a> using <a href="https://getkirby.com/">Kirby</a> </div></div>
      </div>
    </div>
  </footer>

  <?= js([
    'assets/js/prism.js',
    'assets/js/lightbox.js',
    'assets/js/index.js',
    '@auto'
  ]) ?>

</body>
</html>
