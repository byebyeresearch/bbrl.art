<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The note snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<article class="note-excerpt">
  <a href="<?= $event->url() ?>">
    <header>
      <figure class="img" style="--w:1; --h:1">
        <?php if ($cover = $event->cover()): ?>
        <?= $cover->crop(500) ?>
        <?php endif ?>
      </figure>

      <time class="note-excerpt-date" datetime="<?= $event->date('c') ?>"><?= $event->date()->toDate('l, F j, Y') ?> at <?= $event->date()->toDate('g:iA T') ?></time>
      <h2 class="note-excerpt-title"><?= $event->title() ?></h2>
      <h2 class="note-excerpt-location"><?= $event->location() ?></h2>
    </header>
    <?php if (($excerpt ?? true) !== false): ?>
    <div class="note-excerpt-text">
      <?= $event->text()->toBlocks()->excerpt(280) ?>
    </div>
    <?php endif ?>
  </a>
</article>
