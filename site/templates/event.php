<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This note template renders a blog article. It uses the `$page->cover()`
  method from the `note.php` page model (/site/models/page.php)

  It also receives the `$tag` variable from its controller
  (/site/controllers/note.php) if a tag filter is activated.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

<article class="note">


  <header class="note-header h1">
    <?php if ($cover = $page->cover()): ?>
    <figure>
        <?= $cover ?>
      <?php if ($cover->isNotEmpty()): ?>
      <figcaption class="img-caption">
        <?= $cover->caption() ?>
      </figcaption>
      <?php endif ?>
    </figure>
    <?php endif ?>

    <time class="note-date" datetime="<?= $page->date('c') ?>"><small><?= $page->date()->toDate('l, F j, Y') ?> at <?= $page->date()->toDate('g:iA T') ?></small></time>

    <h1 class="note-title"><?= $page->title()->html() ?></h1>
    
    <?php if ($page->subheading()->isNotEmpty()): ?>
    <p class="note-subheading"><small><?= $page->subheading()->html() ?></small></p>
    <?php endif ?>

    <a href="https://www.google.com/maps/search/?api=1&query=<?= $page->location()?>" target="_blank" rel="noopener noreferrer">
      <p class="note-location"><small><?= $page->location()?></small></p>
    </a>

    <div class="note-tags">
      <?php if (!empty($tags)): ?>
      <ul class="note-tags-list">
        <?php foreach ($tags as $tag): ?>
        <li>
          <a href="<?= $page->parent()->url(['params' => ['tag' => $tag]]) ?>"><?= html($tag) ?></a>
        </li>
        <?php endforeach ?>
      </ul>
      <?php endif ?>
    </div>
  </header>


  <div class="note text">
    <?= $page->text()->toBlocks() ?>

    <time class="note-updated" datetime="<?= $page->modified('c') ?>"><small>Last updated on <?= $page->modified('Y-m-d H:i') ?></small></time>
  </div>


  <footer class="note-footer">

    <div class="note-authors">
      <header>
        <h2>Artists</h2>
      </header>
      <ul class="note-authors-list">
        <?php if ($page->author()->isNotEmpty()): ?>
          <?php $users =  $page->author()->toUsers();
                foreach($users as $user): ?>
          <li>
            <figure>
              <?php if ($user->website()->isNotEmpty()): ?>
              <?= $user->avatar() ?>
              <?php else: ?>
              <div class="no-image"></div>
              <?php endif ?>
              <figcaption>
                <p class="name"><?= $user->nameOrEmail() ?></p>
                
                <?php if ($user->website()->isNotEmpty()): ?>
                  <p><a href="<?= $user->website() ?>" target="_blank" rel="noopener noreferrer">
                  <?= $user->website() ?></a></p>
                <?php endif ?>

                <?php if ($user->twitter()->isNotEmpty()): ?>
                  <p><a href="https://twitter.com/<?= $user->twitter() ?>" target="_blank" rel="noopener noreferrer">Twitter</a></p>
                <?php endif ?>

                <?php if ($user->instagram()->isNotEmpty()): ?>
                  <p><a href="https://instagram.com/<?= $user->instagram() ?>" target="_blank" rel="noopener noreferrer">Instagram</a></p>
                <?php endif ?>
              </figcaption>
            </figure>
          </li>
          <?php endforeach ?>
        <?php endif ?>
      </ul>
    </div>

  </footer>

  <!-- <?php snippet('prevnext') ?> -->

</article>

<?php snippet('footer') ?>
