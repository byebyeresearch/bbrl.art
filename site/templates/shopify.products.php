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

<ul class="products">
    <?php
    // let's fetch all visible children from the blog page and sort them by their date field
    $articles = page('products')->children()->listed()->sortBy(function ($page) {
      return $page->shopifyCreatedAt()->toDate('Y-m-d H:i:s');
    }, 'desc') ?>
    
    <?php foreach($articles as $subpage): ?>
          <?php if ($subpage->shopifyVariants()->toStructure()->first()->inventory_quantity()->toInt() == 0) : ?>
          
          <?php else : ?>
          <li>
          <a href="<?= $subpage->url() ?>">
            <figure>
              <img src="<?= $subpage->shopifyImages()->toStructure()->first()->src()->img_url('500x') ?>" />
            </figure>
            <div>
              <span><?= html($subpage->title()) ?> <?php if ($subpage->shopifyVariants()->toStructure()->first()->inventory_quantity()->toInt() == 0) : ?><br>*Sold Out*<?php else : ?>$<?= html($subpage->shopifyPrice()) ?> AUD<?php endif ?></span>
            </div>
          </a>
        </li>
          <?php endif ?>

    <?php endforeach ?>

    <?php foreach($articles as $subpage): ?>
          <?php if ($subpage->shopifyVariants()->toStructure()->first()->inventory_quantity()->toInt() == 0) : ?>
            <li class='sold-out'>
          <a href="<?= $subpage->url() ?>">
            <figure>
              <img src="<?= $subpage->shopifyImages()->toStructure()->first()->src()->img_url('500x') ?>" />
            </figure>
            <div>
              <span><?= html($subpage->title()) ?> <?php if ($subpage->shopifyVariants()->toStructure()->first()->inventory_quantity()->toInt() == 0) : ?><br>*Sold Out*<?php else : ?>$<?= html($subpage->shopifyPrice()) ?> AUD<?php endif ?></span>
            </div>
          </a>
        </li>
          <?php else : ?>

          <?php endif ?>

    <?php endforeach ?>


</ul>

<?php snippet('footer') ?>