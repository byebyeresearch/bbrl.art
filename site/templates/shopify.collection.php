<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This default template must not be removed. It is used whenever Kirby
  cannot find a template with the name of the content file.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

<article>
  <h1 class="h1"><?= $page->title()->html() ?></h1>
  <ul class="products">
  <?php foreach($page->children() as $subpage): ?>
    <li>
    <a href="<?= $site->url() ?>/products/<?= $subpage->shopifyHandle() ?>">
    <img src="<?= $site->page('products')->children()->find($subpage->shopifyHandle())->shopifyFeaturedImage()->toStructure()->first()->src()->img_url('400x400') ?>"/>
    <span><?= html($subpage->title()) ?> $<?= html($site->page('products')->children()->find($subpage->shopifyHandle())->shopifyPrice()) ?></span>
    </a>
    </li>
    <?php endforeach ?>
  </ul>
  
</article>



<?php snippet('footer') ?>