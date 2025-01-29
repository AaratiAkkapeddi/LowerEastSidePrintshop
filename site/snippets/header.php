<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php
  /*
    In the title tag we show the title of our
    site and the title of the current page
  */
  ?>
  <title><?= $site->title()->esc() ?> | <?= $page->title()->esc() ?></title>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
    'assets/css/prism.css',
    'assets/css/lightbox.css',
    'assets/css/index.css',
    '@auto'
  ]) ?>

  <?php
  /*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
  ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>
<body>

  <header class="header">
    <?php
    /*
      We use `$site->url()` to create a link back to the homepage
      for the logo and `$site->title()` as a temporary logo. You
      probably want to replace this with an SVG.
    */
    ?>
    <a class="logo" href="<?= $site->url() ?>">
      <img src="../../assets/icons/logo.png"/>
    </a>

    <nav class="menu">
      <?php
      /*
        In the menu, we only fetch listed pages,
        i.e. the pages that have a prepended number
        in their foldername.

        We do not want to display links to unlisted
        `error`, `home`, or `sandbox` pages.

        More about page status:
        https://getkirby.com/docs/reference/panel/blueprints/page#statuses
      */
      ?>
      <a class="drawer-toggle <?php if ($page->slug()=='mission' || $page->slug()=='contact' || $page->slug()=='staff-board' || $page->slug()=='studio')echo "perma-open";?>">About</a>

      <div class="drawer <?php if ($page->slug()=='mission' || $page->slug()=='contact' || $page->slug()=='staff-board' || $page->slug()=='studio')echo "perma-open";?>">
        <a class="<?php if ($page->slug()=='mission')echo "perma-open";?>" href="/mission">Mission & History</a>
        <a class="<?php if ($page->slug()=='contact')echo "perma-open";?>" href="/contact">Contact Us</a>
        <a class="<?php if ($page->slug()=='staff-board')echo "perma-open";?>" href="/staff-board">Staff & Board</a>
        <a class="<?php if ($page->slug()=='studio')echo "perma-open";?>" href="/studio">Studio</a>
      </div>

      <a class="<?php if (str_contains($page->slug(), 'exhibition'))echo "perma-open";?>" href="/exhibitions">Exhibitions</a>

      <a class="drawer-toggle <?php if (str_contains($page->slug(), 'classes-workshops') || $page->slug()=='tours-demos' || $page->slug()=='internships')echo "perma-open";?>">Education</a>
      <div class="drawer <?php if (str_contains($page->slug(), 'classes-workshops') || $page->slug()=='tours-demos' || $page->slug()=='internships')echo "perma-open";?>">
        <a class="<?php if (str_contains($page->slug(), 'classes-workshops'))echo "perma-open";?>" href="/classes-workshops">Classes & Workshops</a>
        <a class="<?php if ($page->slug()=='tours-demos')echo "perma-open";?>" href="/tours-demos">Tours & Demos</a>
        <a class="<?php if ($page->slug()=='internships')echo "perma-open";?>" href="/internships">Internships</a>
      </div>
 

      <a class="drawer-toggle <?php if ($page->slug()=='publishing-residency' || $page->slug()=='keyholder-residency')echo "perma-open";?>">Opportunities</a>
      <div class="drawer  <?php if ($page->slug()=='publishing-residency' || $page->slug()=='keyholder-residency')echo "perma-open";?>">
        <a class="<?php if ($page->slug()=='keyholder-residency')echo "perma-open";?>" href="/keyholder-residency">Keyholder Residency</a>
        <a class="<?php if ($page->slug()=='publishing-residency')echo "perma-open";?>" href="/publishing-residency">Publishing Residency</a>
      </div>

      <a class="drawer-toggle  <?php if ($page->slug()=='printing' || $page->slug()=='studio-rental')echo "perma-open";?>">Services</a>
      <div class="drawer  <?php if ($page->slug()=='printing' || $page->slug()=='studio-rental')echo "perma-open";?>">
        <a class="<?php if ($page->slug()=='printing')echo "perma-open";?>" href="/printing">Printing </a>
        <a class="<?php if ($page->slug()=='studio-rental')echo "perma-open";?>" href="/studio-rental">Studio Rental</a>
      </div>

      <a class="<?php if (str_contains($page->slug(), 'artwork') || str_contains($page->slug(), 'artist'))echo "perma-open";?>" href="/artworks">Artwork</a>

      <a class="<?php if ($page->slug()=='support')echo "perma-open";?>" href="/support">Support </a>

    </nav>
  </header>

  <!-- <main class="main"> -->
