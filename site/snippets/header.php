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
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
    'assets/css/index.css',
    'assets/css/prism.css',
    'assets/css/lightbox.css',
    'assets/css/shopify.css',
    'assets/css/flickity.min.css',
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

  <header class="main-header is-visible static" id="main-header">
    <h1>
      <a class="logo" href="<?= $site->url() ?>">
        <?= $site->title()->html() ?>
      </a>
      
    </h1>
    
    <span hidden id="menu-label">Main menu</span>
    <button class="menu-toggle" id="menu-toggle" aria-labelledby="menu-label" aria-expanded="false">☰</button>

    <nav class="menu" aria-labelledby="menu-label" id="menu">

      <ul>
        <?php foreach ($site->children()->listed() as $item): ?>
          <li><a <?php e($item->isOpen(), 'aria-current ') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
        <?php endforeach ?>
        
        <li data-cart></li>

        <!-- <?php snippet('social') ?> -->
      </ul>
    </nav>
  </header>

  <main class="main">
  <div id="hero"></div>
