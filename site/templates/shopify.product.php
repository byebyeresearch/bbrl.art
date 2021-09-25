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
  <div class="product-images" data-flickity='{ "imagesLoaded": true, "percentPosition": false }'>

    <?php foreach ($page->shopifyImages()->toStructure() as $image): ?>
      <a href="<?= $image->src()->img_url('1000x') ?>" data-lightbox>
      <figure class="img" alt="Product image of <?= $page->title()->html() ?>">
      <img src="<?= $image->src()->img_url('500x') ?>" />
      </figure>
    </a>
    <?php endforeach ?>

  </div>

  <div class="product-info">
    <h1 class="h1"><?= $page->title()->html() ?></h1>
    <p class="price"><?php if ($page->shopifyVariants()->toStructure()->first()->inventory_quantity()->toInt() == 0) : ?>*Sold Out*<?php else : ?>$<?= html($page->shopifyPrice()) ?> AUD<?php endif ?></p>
    <div class="description"><?= $page->shopifyDescriptionHTML() ?>
    </div>
    
    <div data-product></div>
  </div>






  </div>
  <!-- Tags:
<?php foreach ($page->shopifyTags()->split(',') as $key => $tag): ?>
  <?= $tag ?>
<?php endforeach ?> -->


</article>


<?php snippet('footer') ?>